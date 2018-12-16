<?php

require APPPATH . '/libraries/REST_Controller.php';

class Api extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
		$this->load->model('m_calon');
		$this->load->model('m_login');
		$this->load->model('m_utama');
		$this->load->model('m_campaign');
    }

    // get data pemilihan
    function authcode_get() {
        $id = de($this->get('id'));
        $pin = de($this->get('pin'));
        $this->validation($id,$pin);
    }
    
    // get data pemilihan
    function auth_get() {
        $id = $this->get('id');
        $pin = $this->get('pin');
        $this->validation($id,$pin);
    }
    
    // get data pemilihan
    function validation($id,$pin) {
        if ($id == ''){
            $this->response(array('message'=> 'Kode pemilih kosong','status' => 'fail', 'code'=>502));
        }else if ($pin == ''){
            $this->response(array('message'=> 'Pin pemilih kosong','status' => 'fail', 'code'=>502));
        } else {
            $thn=date('Y');
			$jam=date('Y-m-d H:i:s');
			$cekmahas=$this->m_login->cekmahas($id,$pin,$thn);
			$cekdos=$this->m_login->cekdos($id,$pin,$thn);
			$cektu=$this->m_login->cektu($id,$pin,$thn);
			if($cekmahas->num_rows()>0){
                $row=$cekmahas->row_array();
				$akses=$row['id_akses'];
				$camp=$row['id_campaign'];
				$mul=$row['mulai'];
				$sel=$row['selesai'];
				if(($mul<$jam) and ($jam<$sel)){
                    if($row['status']==0){
                        $this->response(array('kode_pemilih'=>$id, 'pin'=>$pin,'nama_pemilih'=>$row['nama_mahas'],'akses'=>$akses, 'id_campaign'=>$camp,'message'=> 'Kode pemilih sudah melakukan pemilihan','status' => 'fail', 'code'=>501));
					}else{
                        $calon = $this->m_calon->ambil_data_api(1,$camp,$thn)->result();
                        $this->response(array('kode_pemilih'=>$id, 'pin'=>$pin,'nama_pemilih'=>$row['nama_mahas'],'akses'=>$akses, 'id_campaign'=>$camp,'calon'=>$calon, 'code'=>200));
					}
				}else{
                    $this->response(array('message'=> 'Waktu pemilihan tidak sesuai','status' => 'fail', 'code'=>502));
				}
			
			}elseif($cekdos->num_rows()>0){
				$row=$cekdos->row_array();
				$akses=$row['id_akses'];
				$camp=$row['id_campaign'];
				$mul=$row['mulai'];
				$sel=$row['selesai'];
                if(($mul<$jam) and ($jam<$sel)){
                    if($row['status']==0){
                        $this->response(array('kode_pemilih'=>$id, 'pin'=>$pin,'nama_pemilih'=>$row['nama_dos'],'akses'=>$akses, 'id_campaign'=>$camp,'message'=> 'Kode pemilih sudah melakukan pemilihan','status' => 'fail', 'code'=>501));
					}else{
                        $calon = $this->m_calon->ambil_data(1,$camp,$thn)->result();
                        $this->response(array('kode_pemilih'=>$id, 'pin'=>$pin,'nama_pemilih'=>$row['nama_dos'],'akses'=>$akses, 'id_campaign'=>$camp, 'calon'=>$calon, 'code'=>200));
					}
				}else{
                    $this->response(array('message'=> 'Waktu pemilihan tidak sesuai','status' => 'fail', 'code'=>502));
				}
			}elseif($cektu->num_rows()>0){
				$row=$cektu->row_array();
				$akses=$row['id_akses'];
				$camp=$row['id_campaign'];
				$mul=$row['mulai'];
				$sel=$row['selesai'];
				$this->session->set_userdata('id',$id);
				$this->session->set_userdata('akses',$akses);
				if(($mul<$jam) and ($jam<$sel)){
                    if($row['status']==0){
                        $this->response(array('kode_pemilih'=>$id, 'pin'=>$pin,'nama_pemilih'=>$row['nama_tu'],'akses'=>$akses, 'id_campaign'=>$camp,'message'=> 'Kode pemilih sudah melakukan pemilihan','status' => 'fail', 'code'=>501));
					}else{
                        $calon = $this->m_calon->ambil_data(1,$camp,$thn)->result();
                        $this->response(array('kode_pemilih'=>$id, 'pin'=>$pin,'nama_pemilih'=>$row['nama_tu'],'akses'=>$akses, 'id_campaign'=>$camp, 'calon'=>$calon, 'code'=>200));
					}
				}else{
                    $this->response(array('message'=> 'Waktu pemilihan tidak sesuai','status' => 'fail', 'code'=>502));
				}
			}else{
				$this->response(array('message'=> 'Kode atau pin pemilih tidak sesuai','status' => 'fail', 'code'=>502));
			}
        }
    }

    // get data pemilihan
    function pemilihan_get(){
        $camp = $this->get('campaign');
        $thn = $this->get('tahun');
        if($camp && !$thn){
            $where = array(
                'A.id_campaign' => $camp
            );
        }elseif($thn && !$camp){
            $where = array(
                'A.tahun' => $thn
            );
        }elseif(($camp) && ($thn)){
            $where = array(
                'A.id_campaign' => $camp,
                'A.tahun' => $thn
            );
        }else{
            $where = array();
        }
        $data = $this->db->from('tahun_pemilihan AS A')->join('campaign AS B', 'A.id_campaign = B.id_campaign')->where($where)->get()->result();
        if($data){
            $this->response(array('data'=> $data, 'code'=>200));
        }else{
            $this->response(array('message'=> 'Tidak ada data yang tersedia','status' => 'fail', 'code'=>502));
        }
    }

    // insert proses pemilhan / voting
    function prosespoling_post() {
        $nom=$this->post('no_urut');
		$user=$this->post('id_pemilih');
		$camp=$this->post('id_campaign');
        $thn=date('Y');
        $waktu=date('Y-m-d H:i:s');
        $pin = de($this->get('pin'));
        if ($nom == ''){
            $this->response(array('message'=> 'Nomor urut calon kosong','status' => 'fail', 'code'=>502));
        }else if($user == ''){
            $this->response(array('message'=> 'ID pemilih kosong','status' => 'fail', 'code'=>502));
        }else if($camp == ''){
            $this->response(array('message'=> 'ID campaign kosong','status' => 'fail', 'code'=>502));
        }else{
            // cek keserdiaan calon
            $wherecalon = array (
                'tahun' => $thn,
                'no_urut'  => $nom,
            );
            $valcalon = $this->db->where($wherecalon)->get('calon')->num_rows();
            
            // cek keserdiaan pemilih
            $wherepemilih = array (
                'tahun' => $thn,
                'id_user'  => $user
            );
            $valpemilih = $this->db->where($wherepemilih)->get('pemilih');
            
            //cek keserdiaan campaign
            $wherecampg = array (
                'tahun' => $thn,
                'id_campaign'  => $camp
            );
            $valcamp = $this->db->where($wherecampg)->get('tahun_pemilihan')->num_rows();

            // validasi
            if($valcalon<1){
                $this->response(array('message'=> 'No urut calon tidak terdaftar','code'=>502)); // response
            }elseif($valpemilih->num_rows()<1){
                $this->response(array('message'=> 'ID Pemilih tidak terdaftar','code'=>502)); // response
            }elseif($valpemilih->row_array()['status']!=1){
                $this->response(array('message'=> 'ID Pemilih sudah melakukan pemilihan','code'=>502)); // response
            }elseif($valcamp<1){
                $this->response(array('message'=> 'ID Campaign tidak terdaftar','code'=>502)); // response
            }else{
                $data=array(
                    'id_poling'=> $user.'-'.$waktu,
                    'id_pemilih'=> $user,
                    'tahun'=> $thn,
                    'no_urut'=> $nom,
                    'id_campaign'=> $camp,
                    'waktu'=> $waktu,
                    'poin'=> 1
                );
                $data2=array(
                    'status'=>0
                );
                // save voting
                $this->m_utama->insert($data);
                $this->m_utama->update($data2,$thn.$camp.$user); // update status pemilih
                $this->response(array('message'=> 'Sukses melakukan pemilihan','code'=>200)); // response
            }
        }
    }

    // get data perolehan suara
    function hasil_get(){
        $camp=$this->get('id_campaign');
        $thn=$this->get('tahun');
        if ($camp == ''){
            $this->response(array('message'=> 'Campaign pemilihan kosong','status' => 'fail', 'code'=>502));
        }else if($thn == ''){
            $this->response(array('message'=> 'Tahun pemilihan kosong','status' => 'fail', 'code'=>502));
        } else {
            $cekcamp = $this->db->where('id_campaign',$camp)->get('tahun_pemilihan')->num_rows();
            $cektahun = $this->db->where('tahun',$thn)->get('tahun_pemilihan')->num_rows();
            if(!$cekcamp){
                $this->response(array('message'=> 'ID Campaign tidak terdaftar','status' => 'fail', 'code'=>502));
            }elseif(!$cektahun){
                $this->response(array('message'=> 'Tahun pemilihan tidak terdaftar','status' => 'fail', 'code'=>502));
            }else{
                $campaign = $this->m_campaign->cek_id($camp)->row_array();
                $calon = $this->m_calon->ambil_data_api(1,$camp,$thn)->result();
                $this->response(array('id_campg'=>$campaign['id_campaign'],'nama_campaign'=>$campaign['nama_campaign'], 'tahun'=>$thn, 'calon'=>$calon,'code'=>200));
            }
        }
    }
}

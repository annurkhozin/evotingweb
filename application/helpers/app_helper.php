<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function potong_text($text,$max=50,$dot=true){
	$data=strip_tags($text);
	$data=substr($data,0,$max);
	if($dot==true){
		$data.=" ...";
	}
	return $data;
}

function select($i,$j){
	if($i==$j){
		return "selected";
	}
}

function Currency($number) {
	return 'Rp '.number_format($number,2,',','.');
}

function rupiah($number) {
	return 'Rp '.number_format($number,2,',','.');
}
function rp($number) {
	return 'Rp '.number_format($number,0,',','.');
}

function dt($datetime){
	return date_format(date_create($datetime),"d M Y H:i:s");
}

function tgl($datetime){
	return date_format(date_create($datetime),"d-M-y");
}

function date_long($datetime){
	return date_format(date_create($datetime),"d F Y");
}

function date_time(){
	return date('Y-m-d H:i:s');
}
function date_now(){
	return date('Y-m-d');
}

function imgcaptcha(){
	$CI =& get_instance();
	$files = glob('./captcha/*');	
	foreach($files as $file){
		if(is_file($file)){
			unlink($file);
		}
	}
	$CI->load->helper('captcha');
	$vals = array(
		'img_path'		=> './captcha/',
		'img_url'		=> base_url().'captcha/',
		'expiration'	=> 7200,
		'word_length'   => 6,
		'pool'			=> 'abcdeCDRSTijk01UVfgh234lmnopqrEFGHIJ56789KLMNOPQstuvwxyzABWXYZ',
		
	);
	$cap = create_captcha($vals);
	$CI->session->set_userdata('authcaptcha', $cap['word']);
	return $cap['image'];
}

function qrcode($string){
	$CI =& get_instance();
	$file = FCPATH.'/barcode/'.$string.'.png';
	if(is_file($file)){
		unlink($file);
	}

	$CI->load->library('ciqrcode');
		
	$params['data'] = $string;
	$config['cacheable']	= true; 
	$config['quality']		= true;
	$config['black']		= array(224,255,255);
	$config['white']		= array(70,130,180);
	$CI->ciqrcode->initialize($config);
	$params['level'] = 'H';
	$params['size'] = 10;
	$params['savename'] = FCPATH.'/barcode/'.$string.'.png';
	$CI->ciqrcode->generate($params);

}

function acak($type,$panjang){
	if($type=='number'){
		$karakter = '1234567890';
	}else{
		$karakter = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
	}
	$string = '';
	for ($i = 0; $i < $panjang; $i++) {
		$pos = rand(0, strlen($karakter)-1);
		$string .= $karakter{$pos};
	}
	return $string;
}

function mailkartu($emailto,$user_name,$username,$password,$campaign_id,$campaign_name,$time){
	$CI =& get_instance();
	$string = en($username)."_".en($password);
	qrcode($string);
	$CI->load->model('EmailConfig'); // load configurations email
	$fromMail = $CI->EmailConfig->sendDefault(); // load configurations email
	$CI->email->from($fromMail['smtp_user'], $fromMail['name']);
	$CI->email->to($emailto); 
	$where = array(
		'name' => 'kartu',
	);
	$hasil=$CI->db->select('subject, message')->where($where)->get('emailtemplate')->row_array();
	if($hasil==null){
		$CI->session->set_flashdata('error','Gagal Kirim Email');	
	}else{
		$CI->email->subject($hasil['subject']);
		$content = $hasil['message'];
		$urlauto = base_url().'logedin?n='.en($user_name).'&i='.en(en($username)).'&p='.en(en($password));
		$urlpage = base_url().'Login';
		$file = FCPATH.'/barcode/'.$string.'.png';
		$CI->email->attach($file);
		$cid = $CI->email->attachment_cid($file, 'inline');
		$vars = array(
			'{id_pemilih}' => $username,
			'{pin}' => $password,
			'{time}' => $time,
			'{name_user}' => $user_name,
			'{campaign}' => $campaign_name,
			'{url_auto}' => $urlauto,
			'{url_page}' => $urlpage,
			'{link_download}' => 'https://drive.google.com/open?id=18DsjIG4X7iyBxsmszTr7bidut4-wq7xn',
			'{barcode}' => $cid,
			'{name_system}'	=> 'Pemilihan Umum'
		);
		$body = strtr($content, $vars);
		$CI->email->message($body);
		$CI->email->send();
		if(is_file($file)){
			unlink($file);
		}

	}
}

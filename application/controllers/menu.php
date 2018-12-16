<?php date_default_timezone_set('Asia/Jakarta'); $thn=date('Y');
$title_ku="Pemilu ".$thn;
if (($this->lev1!=null) AND ($lev2==null) AND ($lev3==null) AND ($lev4==null) AND ($lev5==null)){
			$data['title']=$this->lev1.$this->tukaran.$title_ku;
		}else if (($this->lev1!=null) AND ($lev2!=null) AND ($lev3==null) AND ($lev4==null) AND ($lev5==null)){
			$data['title']=$lev2.$this->tukaran.$this->lev1.$this->tukaran.$title_ku;
		} else if (($this->lev1!=null) AND ($lev2!=null) AND ($lev3!=null) AND ($lev4==null) AND ($lev5==null)){
			$data['title']=$lev3.$this->tukaran.$lev2.$this->tukaran.$this->lev1.$this->tukaran.$title_ku;
		} else if (($this->lev1!=null) AND ($lev2!=null) AND ($lev3!=null) AND ($lev4!==null) AND ($lev5==null)){
			$data['title']=$lev4.$this->tukaran.$lev3.$this->tukaran.$lev2.$this->tukaran.$this->lev1.$this->tukaran.$title_ku;
		} else if (($this->lev1!=null) AND ($lev2!=null) AND ($lev3!=null) AND ($lev4!==null) AND ($lev5!=null)){
			$data['title']=$lev5.$this->tukaran.$lev4.$this->tukaran.$lev3.$this->tukaran.$lev2.$this->tukaran.$this->lev1.$this->tukaran.$title_ku;
		}
		$data['corong']=" <i class='icon-angle-right'></i> ";
		$data['menu']='menuadmin.php';
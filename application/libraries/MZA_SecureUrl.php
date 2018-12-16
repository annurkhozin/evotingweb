<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 
/*
*	Date Created : 15 Agustus 2011
*	Author	 : Moch. Zawaruddin Abdullah (MZA)
*	Email		 : zawaruddin017@gmail.com
*	Messenger	 : frodo_baggins777@yahoo.com
*
*
*	Name		 : MZA_SecureUrl
*	Desc		 : Untuk menenkripsi dan dekripsi url dan parameternya / to encode and decode URL and parameters
*	Modified	 : 8 Januari 2012
*	Version		 : 2.0
*/

/*
 * You can use this class in your CodeIgniter application or
 * modify it to suite your need as long as you keep
 * my name as orginal author.
 * 
 * Please send me an email if you found bug or have any suggestion. ;)
 */


class MZA_SecureUrl{
	private $valid_url, $parse, $length, $point1, $point2;
    
	function MZA_SecureUrl(){
		$this->obj =& get_instance();
		
		$this->valid_url = md5('mza secure url');  // you can change the string
		$this->parse	 = 'mza secure url';  // you can change the string
		$this->length	 = 5;  // you can change the value. Min : 1, Max : 32;
		$this->point1	 = 5;  // you can change the value. Min : 1, Max : point1 + length : 32
		$this->point2	 = 17;  // you can change the value. Min : 1, Max : point2 + length : 32
	}
	
	function _get_iv(){
		$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
		return mcrypt_create_iv($iv_size, MCRYPT_RAND);
    }
	
    function setSecureUrl_encode($class,$function, $param = array()){ // array $param only singel dimension of array, can't multidimension. 
		$parameter = '';											  // Send me an email if you have any suggestion. 
		$function = $this->_encodeUrl($function);
		if(!empty($param)){
			foreach($param as $value){
				$parameter .= $value.'/';
			}
			$parameter = $this->_encodeUrl(substr($parameter,0,-1));
			return $class.'/secure/'.substr($this->valid_url,$this->point1,$this->length).$function.substr($this->valid_url,$this->point2,$this->length).$parameter;
		}else{
			return $class.'/secure/'.substr($this->valid_url,$this->point1,$this->length).$function;
		}
	}
	
	function _encodeUrl($url){
		return str_replace(array('+','/','='),array('-','_',' '),base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($this->parse), $url, MCRYPT_MODE_ECB, $this->_get_iv())));
	}
	
	function _decodeUrl($url){
		return mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($this->parse), base64_decode($url), MCRYPT_MODE_ECB, $this->_get_iv());
	}
	
	function setSecureUrl_decode($url){
		$url = str_replace(array('-','_',' '),array('+','/','='),urldecode($url));
		if($this->_isValid_url($url)){
			$parameter = '';
			$data = explode(substr($this->valid_url,$this->point2,$this->length),substr($url,$this->length));
			$url = $this->_decodeUrl($data[0]);
			if(!empty($data[1])){
				$parameter = trim($this->_decodeUrl($data[1]));
				$parameter = explode('/', $parameter);		
				return array('function' => trim($url), 'params' => $parameter);
			}else{
				return array('function' => trim($url), 'params' => null);
			}
		}else{
			return false;
		}
	}
	
	function _isValid_url($url){
		if(strcmp(substr($url,0,$this->length),substr($this->valid_url,$this->point1,$this->length)) == 0){
			return true;
		}else{
			return false;
		}
	}
}
?>

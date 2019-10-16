<?php
/**
 * 
 */
class My_controller extends CI_Controller
{
	
	function EncryptPassword($string) {
	    $encrypt_method = "AES-256-CBC";
	    $secret_key = 'parahit@#Technology';
	    $secret_iv = '128459633';
	    $key = hash('sha256', $secret_key);
	    $iv = substr(hash('sha256', $secret_iv), 0, 16);
		$output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
		$output = base64_encode($output);
	    return $output;
	}
    function DecryptPassword($string) {
	    $encrypt_method = "AES-256-CBC";
	    $secret_key = 'parahit@#Technology';
	    $secret_iv = '128459633';
	    // hash
	    $key = hash('sha256', $secret_key);
	    
	    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
	    $iv = substr(hash('sha256', $secret_iv), 0, 16);
		$output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
	    return $output;
	}
	//Base64 Encode and Decode String in PHP
	function base64url_encode($plainText) {
		$base64 = base64_encode($plainText);
		$base64url = strtr($base64, '+/=', '-_,');
		return $base64url;
	}

	function base64url_decode($plainText) {
		$base64url = strtr($plainText, '-_,', '+/=');
		$base64 = base64_decode($base64url);
		return $base64;
	}
	//Get Remote IP Address in PHP
	function getRemoteIPAddress() {
		$ip = $_SERVER['REMOTE_ADDR'];
		return $ip;
	}
	function getRealIPAddr()
	{
		if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
		{
			$ip=$_SERVER['HTTP_CLIENT_IP'];
		}
		elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
		{
			$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
		}
		else
		{
			$ip=$_SERVER['REMOTE_ADDR'];
		}
		return $ip;
	}
	function secsToStr($secs) 
	{
		if($secs>=86400)
		{
			$days=floor($secs/86400);$secs=$secs%86400;$r=$days.' day';
			if($days<>1)
			{
				$r.='s';
			}
			if($secs>0)
			{
				$r.=', ';
			}
		}
		if($secs>=3600)
		{
			$hours=floor($secs/3600);$secs=$secs%3600;$r.=$hours.' hour';
			if($hours<>1)
			{
				$r.='s';
			}
			if($secs>0)
			{
				$r.=', ';
			}
		}
		if($secs>=60)
		{
			$minutes=floor($secs/60);$secs=$secs%60;$r.=$minutes.' minute';
			if($minutes<>1)
			{
				$r.='s';
			}
			if($secs>0)
			{
				$r.=', ';
			}
		}
		$r.=$secs.' second';
		if($secs<>1)
			{
				$r.='s';
			}
		return $r;
	}
}

?>

<?php
/**
* @file functions_helper.php
* @synopsis  自定义函数
* @author Yee, <rlk002@gmail.com>
* @version 1.0
* @date 2012-10-14 00:18:41
*/
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function debug($var = null,$type = 2) 
{
	if($var === NULL)
	{
		$var = $GLOBALS;
	}
	header("Content-type:text/html;charset=utf-8");
	echo '<pre style="background-color:black;color:white;font-size:13px; border: 2px solid green;padding: 5px;">变量跟踪信息：'."\n";
	if($type == 1)
	{
		var_dump($var);
	}elseif($type == 2)
	{
		print_r($var);
	}
	echo '</pre>';
	exit();
}

function random($length, $numeric = 0) 
{
	PHP_VERSION < '4.2.0' ? mt_srand((double)microtime() * 1000000) : mt_srand();
	$seed = base_convert(md5(print_r($_SERVER, 1).microtime()), 16, $numeric ? 10 : 35);
	$seed = $numeric ? (str_replace('0', '', $seed).'012340567890') : ($seed.'zZ'.strtoupper($seed));
	$hash = '';
	$max = strlen($seed) - 1;
	for($i = 0; $i < $length; $i++)
	{
		$hash .= $seed[mt_rand(0, $max)];
	}
	return $hash;
}

function ffile_get_contents($url)
{
	$ctx = stream_context_create(
	array(   
        'http' => array(   
				'timeout' => 1 //设置一个超时时间，单位为秒   
				)   
			)
	);   
	$r = file_get_contents($url, 0, $ctx);
	unset($ctx);
	return $r;
}


function authcode($string, $operation = 'DECODE', $key = '', $expiry = 0) 
{
	$ckey_length = 4;
	$key = md5($key != '' ? $key : RC4KEY);
	$keya = md5(substr($key, 0, 16));
	$keyb = md5(substr($key, 16, 16));
	$keyc = $ckey_length ? ($operation == 'DECODE' ? substr($string, 0, $ckey_length): substr(md5(microtime()), -$ckey_length)) : '';

	$cryptkey = $keya.md5($keya.$keyc);
	$key_length = strlen($cryptkey);

	$string = $operation == 'DECODE' ? base64_decode(substr($string, $ckey_length)) : sprintf('%010d', $expiry ? $expiry + time() : 0).substr(md5($string.$keyb), 0, 16).$string;
	$string_length = strlen($string);

	$result = '';
	$box = range(0, 255);

	$rndkey = array();
	for($i = 0; $i <= 255; $i++) {
		$rndkey[$i] = ord($cryptkey[$i % $key_length]);
	}

	for($j = $i = 0; $i < 256; $i++) {
		$j = ($j + $box[$i] + $rndkey[$i]) % 256;
		$tmp = $box[$i];
		$box[$i] = $box[$j];
		$box[$j] = $tmp;
	}

	for($a = $j = $i = 0; $i < $string_length; $i++) {
		$a = ($a + 1) % 256;
		$j = ($j + $box[$a]) % 256;
		$tmp = $box[$a];
		$box[$a] = $box[$j];
		$box[$j] = $tmp;
		$result .= chr(ord($string[$i]) ^ ($box[($box[$a] + $box[$j]) % 256]));
	}

	if($operation == 'DECODE') {
		if((substr($result, 0, 10) == 0 || substr($result, 0, 10) - time() > 0) && substr($result, 10, 16) == substr(md5(substr($result, 26).$keyb), 0, 16)) {
			return substr($result, 26);
		} else {
			return '';
		}
	} else 
	{
		return $keyc.str_replace('=', '', base64_encode($result));
	}
}

function w_log($string,$t = 'day')
{
	$timestamp = time();
	if($t == 'day')
	{
		$f = date('Ymd',$timestamp);
		$filename = BASEDIRS.'log/logs'.$f;
	}elseif($t == 'month')
	{
		$f = date('Ym',$timestamp);
		$filename = BASEDIRS.'log/logs'.$f;
	}
	$logtime = date('Y-m-d H:i:s',$timestamp);
	$record = $logtime.' - '.$string."\n";
	writelog($filename, $record, 'ab');
}

function writelog($filename, $data, $method = 'wb+', $iflock = 1, $check = 1, $chmod = 1)
{
	if (empty($filename))
	{
		return false;
	}

	if ($check && strpos($filename, '..') !== false)
	{
		return false;
	}
	if (!is_dir(dirname($filename)) && !mkdir_recursive(dirname($filename), 0777))
	{
		return false;
  }
	if (false == ($handle = fopen($filename, $method)))
	{
		return false;
	}
	if($iflock)
	{
		flock($handle, LOCK_EX);
	}
	fwrite($handle, $data);
	touch($filename);

	if($method == "wb+")
	{
		ftruncate($handle, strlen($data));
	}
	fclose($handle);
	$chmod && @chmod($filename,0777);
	return true;
}

function mkdir_recursive($pathname, $mode)
{
	if (strpos( $pathname, '..' ) !== false)
	{
		return false;
	}
	$pathname = rtrim(preg_replace(array('/\\{1,}/', '/\/{2,}/'), '/', $pathname), '/');
  if (is_dir($pathname))
  {
  	return true;
 	}

	is_dir(dirname($pathname)) || mkdir_recursive(dirname($pathname), $mode);
	return is_dir($pathname) || @mkdir($pathname, $mode);
}

function create_guidq() 
{
	$charid = md5(uniqid(mt_rand(), true));
	$hyphen = chr(45);
	$uuid = substr($charid, 0, 8).$hyphen
	.substr($charid, 8, 4).$hyphen
	.substr($charid,12, 4).$hyphen
	.substr($charid,16, 4).$hyphen
	.substr($charid,20,12);
	return $uuid;
}

function get_pwd_salt()
{
	$sort = substr(uniqid(rand()), -6);
	return $sort;
}

function get_password_salt($pwd,$salt)
{
	return md5(md5($pwd) . $salt);
}

function exitjson($array = array())
{
	if(is_array($array))
	{
		exit(json_encode($array));
	}else
	{
		exit(json_encode(array('code' => -1,'tips' => 'type is error')));
	}
}

function get_sql_total($obj)
{
	if($obj->dbdriver == 'mysqli' || $obj->dbdriver == 'mysql')
	{
		return $obj->query("SELECT FOUND_ROWS() AS rows")->row()->rows;
	}else
	{
		return 'this database is not support';
	}
}

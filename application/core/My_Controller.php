<?php
/**
* @file My_Controller.php
* @synopsis  核心控制器重写
* @author Yee, <rlk002@gmail.com>
* @version 1.0
* @date 2013-02-18 14:46:29
*/

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class My_Controller extends CI_Controller
{

	public $dbw;
	public $dbr;
	public $mg;
	public $base_url;

	function __construct()
	{
		parent::__construct();
		$this->__init__();
	}

	private function __init__()
	{
		$this->dbr = $this->dbw = $this->load->database('write',true);
		$this->load->driver('cache', array('adapter' => 'file'));
		$this->base_url = base_url();
		$this->smarty->assign('base_url',$this->base_url);	
		$this->smarty->assign('systime',date('r'));
	}

	public function showmessage($messages, $url_forward = '', $second = 3) 
	{
		if($url_forward && empty($second)) 
		{
			header("HTTP/1.1 301 Moved Permanently");
			header("Location: $url_forward");
		}else 
		{
			if($url_forward) 
			{
				$message = "<font color=\"red\" size=\"5\"><b>{$messages}</b></font><script>setTimeout(\"window.location.href ='$url_forward';\", ".($second*1000).");</script>";
			}
			$this->smarty->assign('msg',$message);
			$this->smarty->assign('second',$second);
			$this->smarty->assign('message',$messages);
			$this->smarty->assign('content',"<a href=\"$url_forward\">".$messages."</a>");
			$this->smarty->assign('gourl',$url_forward);
			$this->smarty->display('showmessage.tpl');
		}
		exit();
	}

	public function showmsg($messages, $url_forward = '', $second = 3)  //内部跳转
	{
		if($url_forward && empty($second)) 
		{
			header("HTTP/1.1 301 Moved Permanently");
			header("Location: $url_forward");
		}else 
		{
			if($url_forward) 
			{
				$message = "<font color=\"red\" size=\"5\"><b>{$messages}</b></font><script>setTimeout(\"window.location.href ='" . base_url() . "$url_forward';\", ".($second*1000).");</script>";
			}
			$this->smarty->assign('msg',$message);
			$this->smarty->assign('second',$second);
			$this->smarty->assign('message',$messages);
			$this->smarty->assign('content',"<a href=\"$url_forward\">".$messages."</a>");
			$this->smarty->assign('gourl',$url_forward);
			$this->smarty->display('showmsg.tpl');
		}
		exit();
	}
}

//未登录
class INX_Controller extends My_Controller
{
	public $_admin;
	public $userinfo;
	function __construct()
  {
		parent::__construct();
		$this->loginstatus();
		$this->smarty->assign('user_loginid',$this->_admin['user_id']);
		$this->smarty->assign('uinfo',$this->userinfo);
	}

	private function loginstatus()
	{
		if(!$this->session->userdata('user_id'))
		{
			$this->_admin = false;
		}else
		{
			$this->_admin = array('user_id' => $this->session->userdata('user_id'));
			$userinfo = $this->userm->get_user_by_user_id($this->_admin['user_id']);
			$this->userinfo = $userinfo;
		}	
	}
}


//登录
class BACK_Controller extends My_Controller
{
	public $_admin;
	public $userinfo;
	function __construct()
  {
		parent::__construct();
		$this->_check_login();
		$this->smarty->assign('user_loginid',$this->_admin['user_id']);
		$this->smarty->assign('uinfo',$this->userinfo);
	}

	private function _check_login()
	{
		if(! $this->session->userdata('user_id'))
		{ 
			$this->_admin = false;
			$this->showmessage('对不起，您没有登录...',base_url());
		}
		else
		{
			$this->_admin = array('user_id' => $this->session->userdata('user_id'));
			$userinfo = $this->userm->get_user_by_user_id($this->_admin['user_id']);
			$this->userinfo = $userinfo;
		}
	}	
}

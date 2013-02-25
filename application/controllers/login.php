<?php 
/**
* @file login.php
* @synopsis  登录
* @author Yee, <rlk002@gmail.com>
* @version 1.0
* @date 2013-01-20 15:32:21
*/

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends INX_Controller 
{

	function __construct()
	{
		parent::__construct();
		$this->load->library('secode');
	}

	public function index()
	{
		$post = $this->input->post();
		$username = $post['username'];
		$password = $post['password'];
		if(!$username || !$password)
		{
			$this->showmessage('很抱歉，您执行的登录缺少信息，请点击返回',base_url());
		}
		$code = $post['captcha'];
		if(!$this->checkcode($code))
		{
			$this->showmessage('验证码错误',base_url());
		}
		$logininfo = $this->userm->logincheck($username,$password);
		if($logininfo == -99)
		{
			$this->showmessage('用户名或者密码错误',base_url());
		}else
		{
			$userinfo = $this->userm->get_user_by_username($logininfo['login_name']);
			if($userinfo['status']== 0)
			{
				$this->showmessage('很抱歉，您已经被禁止登陆，如有需要，请联系管理员',base_url());
			}
			$this->session->set_userdata('user_id',$userinfo['user_id']);
			$this->showmessage('登录成功',base_url() . 'main',0);
		}
	}

	public function checkcode($secode)
	{
		return strtolower($secode) != $this->secode->get_code() ? false : true;
	}

	public function logout()
	{
		if($this->session->userdata('user_id'))
		{
			$this->session->unset_userdata('user_id');
			$this->showmessage('退出成功',base_url());
		}else
		{
			$this->showmessage('抱歉，您尚未登录',base_url(),0);
		}
	}
}

<?php
/**
* @file start.php
* @synopsis  首页
* @author Yee, <rlk002@gmail.com>
* @version 1.0
* @date 2013-01-20 20:43:02
*/

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Start extends INX_Controller 
{
	function __construct()
	{
		parent::__construct();
		if($this->_admin['user_id'])
		{
			header("Location: " . base_url(). "main");
		}
	}

	public function index()
	{
		$this->smarty->display('login.tpl');
	}
}

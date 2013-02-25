<?php 
/**
* @file welcome.php
* @synopsis  welcome
* @author Yee, <rlk002@gmail.com>
* @version 1.0
* @date 2013-02-18 14:45:26
*/


if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Start extends INX_Controller
{

	public function index()
	{
		$this->smarty->display('welcome_message.tpl');
	}

	public function test()
	{
		echo 'this is a beckend files';
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */

<?php 
/**
* @file code.php
* @synopsis  验证码生成
* @author Yee, <rlk002@gmail.com>
* @version 1.0
* @date 2013-02-18 14:45:53
*/

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Code extends INX_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('secode');
	}

	public function index()
	{
		$this->secode->doimage();
	}
}

?>

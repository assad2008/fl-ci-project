<?php 
/**
* @file main.php
* @synopsis  首页框架
* @author Yee, <rlk002@gmail.com>
* @version 1.0
* @date 2013-01-20 20:43:28
*/


if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends BACK_Controller 
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('menum');
	}

	public function index()
	{
		$menu = $this->topmenu();
		$this->smarty->assign('topmenu',$menu);
		$this->smarty->display('main.tpl');
	}

	public function menu($menu_id = false)
	{
		$leftmenu = $this->menum->get_left_menu($menu_id,$this->userinfo);
		$this->smarty->assign('menulist',$leftmenu);
		$this->smarty->display('menu.tpl');
	}

	public function topmenu()
	{
		$admin = array();
		if($this->userinfo['level'] != 1)
		{
			$default = $this->menum->get_user_menu($this->userinfo);
			$menulist = $default;
		}else
		{
			$menulist = $this->menum->get_son_menu(0);
		}
		return $menulist;
	}

	public function welcome()
	{
		$this->smarty->assign('ur_here','欢迎页');
		$this->smarty->display('welcome.tpl');
	}
}

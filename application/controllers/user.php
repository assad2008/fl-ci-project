<?php
/**
* @file user.php
* @synopsis  用户管理
* @author Yee, <rlk002@gmail.com>
* @version 1.0
* @date 2013-01-22 14:57:52
*/

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends BACK_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('menum');
	}

	public function index()
	{
		$userlist = $this->userm->get_user_list();
		$this->smarty->assign('ur_here','会员管理');
		$this->smarty->assign('userlist',$userlist);
		$this->smarty->display('userindex.tpl');
	}

	public function bandlogin($user_id)
	{
		$user = $this->userm->get_user_by_user_id($user_id);
		if(!$user)
		{
			$this->showmsg('无此用户','user');
		}
		$this->userm->bandlogin($user_id,0);
		$this->showmsg('禁止用户登录成功','user');
	}

	public function unbandlogin($user_id)
	{
		$user = $this->userm->get_user_by_user_id($user_id);
		if(!$user)
		{
			$this->showmsg('无此用户','user');
		}
		$this->userm->bandlogin($user_id,1);
		$this->showmsg('允许用户登录成功','user');
	}

	public function right($user_id)
	{
		$uinfo = $this->userm->get_user_by_user_id($user_id);
		if(!$uinfo)
		{
			$this->showmsg('无此用户','user');
		}
		$post = $this->input->post();
		if($post)
		{
			$this->userm->insertuserright($user_id,$post['right']);
			$this->userm->insertcc($user_id,$post['cc']);
			$this->userm->insertmenu($user_id,$post['menu']);
			$this->showmsg('更改成功','user');
		}else
		{
			$this->smarty->assign('uinfo',$uinfo);
			$userright = $this->userm->userrightrid($user_id);
			$usercc = explode('|',$this->userm->get_user_ccid($user_id));
			$usermenu = explode('|',$this->userm->get_user_menuid($user_id));
			$rightlist = $this->rightsm->get_right();
			$cclist = $this->ccategorym->get_cc_list(1);
			$menu = $this->menum->get_son_menu(0);
			$this->smarty->assign('rightlist',$rightlist);
			$this->smarty->assign('cclist',$cclist);
			$this->smarty->assign('menu',$menu);
			$this->smarty->assign('usercc',$usercc);
			$this->smarty->assign('userright',$userright);
			$this->smarty->assign('usermenu',$usermenu);
			$this->smarty->assign('action_link',array('link' => 'user','text' => '返回列表'));
			$this->smarty->assign('ur_here','编辑用户权限');
			$this->smarty->display('userright.tpl');
		}
	}

}


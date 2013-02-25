<?php 
/**
* @file main.php
* @synopsis 目录管理
* @author Yee, <rlk002@gmail.com>
* @version 1.0
* @date 2013-01-20 20:43:28
*/

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu extends BACK_Controller 
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('menum');
	}
	
	public function index()
	{
		$data_list = $this->menum->get_menus();
		$this->smarty->assign('ur_here','目录列表');
		$this->smarty->assign('action_link',array('link' => 'menu/edit/-1','text' => '添加目录'));
		$this->smarty->assign('data_list',$data_list);
		$this->smarty->display('menu_list.tpl');
	}
	
	public function edit($menu_id='-1')
	{
		if ($menu_id !== '-1')
		{
			$data = $this->menum->get_one_menu($menu_id);
			$is_menu_level3 = $this->menum->is_menu_level3($menu_id);
			#debug($data);
		}
		else
		{
			$is_menu_level3 = True;
			$data = array('parent' => 0,
						  'status' => 1,
						  'sort' => 255,
						  'is_del' => 0
			);
		}
		$menu_id_List = $this->menum->get_level1or2_menus();
		$this->smarty->assign('ur_here','目录编辑');
		$this->smarty->assign('action_link',array('link' => 'menu','text' => '目录列表'));
		$this->smarty->assign('menu_id_List',$menu_id_List);
		$this->smarty->assign('is_menu_level3',$is_menu_level3);
		$this->smarty->assign('data',$data);
		$this->smarty->display('menu_edit.tpl');
	}
	
	public function update()
	{
		$post = $this->input->post();
		if($post['menu_id'])
		{
			$update_data = array('menu_name' => trim($post['menu_name']),
								 'parent_id' => $post['parent_id'],
								 'url' => trim($post['url']),
								 'hidden' => $post['hidden_group'],
								 'sort' => $post['sort'],
								 'addtime' => time()
								);
			#debug($update_data);
			$this->menum->edit_menu($post['menu_id'], $update_data);
			$this->showmsg("目录更新成功。", "menu");
		}
		else
		{
			$insertdata = array('menu_name' => trim($post['menu_name']),
								'parent_id' => $post['parent_id'],
								'url' => trim($post['url']),
								'hidden' => $post['hidden_group'],
								'sort' => $post['sort'],
								'addtime' => time()
								);
			#debug($insertdata);
			$this->menum->insert_menu($insertdata);
			$this->showmsg("目录添加成功。", "menu");
		}
		header("Location:" . base_url() . "menu");
	}
	
	public function delete($menu_id='-1')
	{
		if($menu_id !== '-1')
		{
			$this->menum->del_menu($menu_id);
		}
		$this->showmsg("目录删除成功。", "menu");
	}
	
	public function select()
	{
		$post = $this->input->post();
		$txt_menu_name = trim($post['txt_menu_name']);
		if (!empty($txt_menu_name))
		{
			$data_list = $this->menum->get_menus_by_name($post['txt_menu_name']);
			$this->smarty->assign('txt_menu_name',$txt_menu_name);
			$this->smarty->assign('ur_here','目录列表');
			$this->smarty->assign('action_link',array('link' => 'menu/edit/-1','text' => '添加目录'));
			$this->smarty->assign('data_list',$data_list);
			$this->smarty->display('menu_list.tpl');
		}
		else
		{
			$this->index();
		}
	}
}

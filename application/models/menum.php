<?php

/**
* @file menum.php
* @synopsis menu model class
* @author Yee, <rlk002@gmail.com>
* @version 1.0
* @date 2013-01-17 16:42:35
*/

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Menum extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
	}

	public function add_menu($menu_name,$parent_id)
	{
		$insertdata = array('menu_name' => $menu_name,
							'parent_id' => $parent_id,
							'addtime' => time(),
											 );
		$this->dbw->insert('menu',$insertdata);
		return $this->dbw->insert_id();
	}
	
	public function insert_menu($insertdata)
	{
		$this->dbw->insert('menu',$insertdata);
		return $this->dbw->insert_id();
	}

	public function del_menu($menu_id)
	{
		$this->dbw->set('is_del',1);
		$this->dbw->where('menu_id',$menu_id);
		$this->dbw->update('menu');
		return $this->dbw->affected_rows() > 0;
	}

	public function hidde_nmenu($menu_id)
	{
		$this->dbw->set('hidden',1);
		$this->dbw->where('menu_id',$menu_id);
		$this->dbw->update('menu');
		return $this->dbw->affected_rows() > 0;
	}

	public function get_one_menu($menu_id)
	{
		$ret = $this->dbr->select()->from('menu')->where('menu_id',$menu_id)->get()->result_array();
		return $ret[0];
	}

	public function get_user_menu($userinfo)
	{
		$ret = $this->get_son_menu(0);
		$data = array();
		$usermenu = explode('|',$userinfo['menuid']);
		foreach($ret AS $v)
		{
			if(in_array($v['menu_id'],$usermenu))
			{
				$data[] = $v;
			}
		}
		return $data;
	}

	public function get_son_menu($menu_id)
	{
		return $this->dbr->select()->from('menu')->where('parent_id',$menu_id)->where('status',1)->where('is_del',0)->order_by('sort','asc')->get()->result_array();
	}

	public function get_menu_parent_id($menu_id)
	{
		return $this->dbr->select('parent_id')->from('menu')->where('menu_id',$menu_id)->get()->result_array();
	}

	public function get_menus()
	{
		return $this->dbr->select()->from('menu')->order_by('menu_id','asc')->get()->result_array();
	}
	
	public function get_menus_by_name($menu_name)
	{
		return $this->dbr->select()->from('menu')->like('menu_name',$menu_name)->order_by('menu_id','asc')->get()->result_array();
	}

	public function edit_menu($menu_id,$data)
	{
		$this->dbw->where('menu_id',$menu_id);
		$this->dbw->update('menu',$data);
	}

	public function get_left_menu($menu_id,$userinfo = array())
	{
		$ret = $this->dbr->select()->from('menu')->where('parent_id',$menu_id)->where('is_del',0)->get()->result_array();
		$data = array();
		foreach($ret AS $row)
		{
			$data[$row['menu_id']]['father'] = $row;
			$data[$row['menu_id']]['son'] = array();
			$retson =  $this->dbr->select()->from('menu')->where('parent_id',$row['menu_id'])->where('is_del',0)->get()->result_array();
			foreach($retson AS $row1)
			{
				$data[$row['menu_id']]['son'][] = $row1;
			}
		}
		return $data;
	}

	public function get_ht_down_menu($userinfo)
	{
		$menu = $this->dbr->select()->from('menu')->where('menu_id',1)->get()->result_array();
		$menu = $menu[0];
		$data = array();
		$cclist = $this->dbr->select()->from('ccategory')->where('pccid',0)->where('status',1)->order_by('sort','asc')->get()->result_array();
		$havecc = explode('|',$userinfo['ccid']);
		foreach($cclist AS $r)
		{
			$cquery = $this->dbr->select()->from('ccategory')->where('pccid',$r['ccid'])->where('status',1)->order_by('sort','asc')->get()->result_array();
			$data[$r['ccid']]['father']['menu_id'] = $r['ccid'];
			$data[$r['ccid']]['father']['menu_name'] = $r['cc_name'];
			foreach($cquery AS $cv)
			{
				if($userinfo['level'] != 1 && !in_array($cv['ccid'],$havecc))
				{
					continue;
				}
				$row1 = array();
				$row1['menu_name'] = $cv['cc_name'];
				$row1['url'] = 'contract_download/'.$cv['ccid'];
				$data[$r['ccid']]['son'][] = $row1;
			}
		}
		return $data;
	}
	
	public function is_menu_level3($menuid)
	{
		$sql = "SELECT flht_menu_self3.* FROM flht_menu flht_menu_self3 WHERE exists (SELECT flht_menu_self2.menu_id FROM flht_menu flht_menu_self2 WHERE flht_menu_self2.menu_id = flht_menu_self3.parent_id and exists(SELECT flht_menu_self1.menu_id FROM flht_menu flht_menu_self1 WHERE flht_menu_self1.menu_id = flht_menu_self2.parent_id and flht_menu_self1.parent_id = 0)) and flht_menu_self3.menu_id = " . $menuid;
		$data = $this->dbr->query($sql);
		if ($data->num_rows() > 0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	public function get_level1or2_menus()
	{
		$sql = "SELECT flht_menu_self2.* FROM flht_menu flht_menu_self2 WHERE exists (SELECT flht_menu_self1.menu_id FROM flht_menu flht_menu_self1 WHERE flht_menu_self1.menu_id = flht_menu_self2.parent_id and flht_menu_self1.parent_id = 0) OR flht_menu_self2.parent_id = 0";
		$data = $this->dbr->query($sql);
		return $data->result_array();
	}

}

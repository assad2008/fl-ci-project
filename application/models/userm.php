<?php
/**
* @file userm.php
* @synopsis  User Model Class
* @author Yee, <rlk002@gmail.com>
* @version 1.0
* @date 2013-01-17 14:36:45
*/

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Userm extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
	}

	public function logincheck($username,$password)
	{
		$this->load->library('curl');
		$login = $this->curl->simple_post('http://pm.feiliu.com/api/checkloginht.php',array('username' => trim($username),'password' => trim($password)));
		$login = json_decode($login,1);
		$userinfo = $login['info'];
		if($login['code'] == 0)
		{
			$exist = $this->get_user_by_username($userinfo['login_name']);
			if(!$exist)
			{
				$this->insertdata($userinfo);
			}
		}else
		{
			return -99;
		}
		return $login['info'];
	}

	public function insertdata($userinfo)
	{
		$data = array();
		$data['boss_id'] = $userinfo['id'];
		$data['username'] = $userinfo['login_name'];
		$data['email'] = $userinfo['email'];
		$data['truename'] = $userinfo['name'];
		$data['coopid'] = $userinfo['coopid'];
		$data['createtime'] = time();
		$this->dbw->insert('user',$data);
	}

	public function get_user_by_username($username)
	{
		$info = $this->dbr->select()->from('user')->where('username',$username)->get()->result_array();
		return $info ? $info[0] : '';
	}

	public function get_user_by_user_id($user_id)
	{
		$info = $this->dbr->select()->from('user')->where('user_id',$user_id)->get()->result_array();
		return $info ? $info[0] : '';
	}

	public function get_user_list()
	{
		return $this->dbr->select()->from('user')->get()->result_array();
	}

	public function bandlogin($user_id,$status = 0)
	{
		$this->dbw->set('status',$status);
		$this->dbw->where('user_id',$user_id);
		$this->dbw->update('user');
	}

	public function userright($user_id)
	{
		$code = array();
		$ret = $this->dbr->select('rights.code')->from('userright')->join('rights','userright.rid=rights.rid')->where('userright.user_id',$user_id)->get()->result_array();
		foreach($ret AS $v)
		{
			$code[] = $v['code'];
		}
		return $code;
	}

	public function userrightrid($user_id)
	{
		$data = array();
		$ret = $this->dbr->select('rid')->from('userright')->where('user_id',$user_id)->get()->result_array();
		foreach($ret AS $v)
		{
			$data[] = $v['rid'];
		}
		return $data;
	}

	public function insertuserright($user_id,$right)
	{
		$this->dbw->where('user_id',$user_id);
		$this->dbw->delete('userright');
		foreach($right AS $v)
		{
			$this->dbw->set('user_id',$user_id);
			$this->dbw->set('rid',$v);
			$this->dbw->insert('userright');
		}
	}

	public function insertcc($user_id,$cc = array())
	{
		$this->dbw->set('ccid',implode('|',$cc));
		$this->dbw->where('user_id',$user_id);
		$this->dbw->update('user');
	}

	public function insertmenu($user_id,$menu = array())
	{
		if($menu)
		{ 
			$this->dbw->set('menuid',implode('|',$menu));
		}else
		{
			$this->dbw->set('menuid',3);
		}
		$this->dbw->where('user_id',$user_id);
		$this->dbw->update('user');
	}

	public function get_user_ccid($user_id)
	{
		$ret = $this->dbr->select('ccid')->from('user')->where('user_id',$user_id)->get()->result_array();
		return $ret[0]['ccid'];
	}

	public function get_user_menuid($user_id)
	{
		$ret = $this->dbr->select('menuid')->from('user')->where('user_id',$user_id)->get()->result_array();
		return $ret[0]['menuid'];
	}
}

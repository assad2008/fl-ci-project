<?php  
/**
* @file Smarty.php
* @synopsis  Smarty libraries
* @author Yee, <rlk002@gmail.com>
* @version 1.0
* @date 2013-01-17 14:18:36
*/

if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once( APPPATH.'libraries/smarty/libs/Smarty.class.php' );

class CI_Smarty extends Smarty 
{

	function CI_Smarty()
	{
		parent::Smarty();
		$this->compile_dir = APPPATH . "views/templates_c";
		$this->template_dir = APPPATH . "views/templates";
		$this->assign( 'APPPATH', APPPATH );
		$this->assign( 'BASEPATH', BASEPATH );

		log_message('debug', "Smarty Class Initialized");
	}

	function __construct()
	{
		parent::__construct();

		$this->compile_dir = APPPATH . "views/templates_c";
		$this->template_dir = APPPATH . "views/templates";
		$this->cache_dir = APPPATH . "views/cache";
		$this->left_delimiter = '<{';
		$this->right_delimiter = '}>';
		$thise->caching = false;
		$this->compile_check = true;
		$this->security = true;
		$this->security_settings['PHP_HANDLING'] = SMARTY_PHP_PASSTHRU;
		$thise->security_settings['ALLOW_CONSTANTS'] = true;
		$this->assign( 'APPPATH', APPPATH );
		$this->assign( 'BASEPATH', BASEPATH );
		self::config($this);
		if ( method_exists( $this, 'assignByRef') )
		{
			$ci =& get_instance();
			$this->assignByRef("ci", $ci);
		}

		log_message('debug', "Smarty Class Initialized");
	}

	public static function config($s)
	{
		$s->assign('date_format', '%Y-%m-%d %H:%M:%S');
		$s->assign('date_format_ymd_hm', '%Y-%m-%d %H:%M');
		$s->assign('date_format_md_hm', '%m-%d %H:%M');
		$s->assign('date_format_yymd_hm', '%y-%m-%d %H:%M');
		$s->assign('date_format_ymd', '%Y-%m-%d');
		$s->assign('date_format_ym', '%Y-%m');	
	}

	public function view($template, $data = array(), $return = FALSE)
	{
		foreach ($data as $key => $val)
		{
			$this->assign($key, $val);
		}
		
		if ($return == FALSE)
		{
			$CI =& get_instance();
			$CI->output->final_output = $this->fetch($template);
			return;
		}
		else
		{
			return $this->fetch($template);
		}
	}
}
// END Smarty Class

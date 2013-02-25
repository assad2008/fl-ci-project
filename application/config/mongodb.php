<?php  
/**
* @file mongodb.php
* @synopsis  MongDB配置文件
* @author Yee, <rlk002@gmail.com>
* @version 1.0
* @date 2013-02-18 10:40:12
*/

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['default']['mongo_hostbase'] = 'localhost:27017';
$config['default']['mongo_database'] = 'shorturl';
$config['default']['mongo_username'] = '';
$config['default']['mongo_password'] = '';
$config['default']['mongo_persist']  = FALSE;
$config['default']['mongo_persist_key']	 = 'yee_persist';
$config['default']['mongo_replica_set']  = FALSE;
$config['default']['mongo_query_safety'] = 'safe';
$config['default']['mongo_suppress_connect_error'] = TRUE;
$config['default']['mongo_host_db_flag']   = FALSE;

<?php

/*$GLOBALS['globals'] = array(
		'mysql'    => array(
				'host'          => '127.0.0.1',
				'username'      => 'root',
				'password'      => '',
				'db'            => 'moondusk_enterprise'
		),
		'image'    => array(
				'dir_profile'      => 'uploads/profile/',
				'path_server_profile'      => 'http://192.168.1.101/Snow/uploads/profile/',
				'dir_attachment'      => 'uploads/attachment/',
				'path_server_attachment'      => 'http://192.168.1.101/Snow/uploads/attachment/',
				'path_server_icon'      => 'http://192.168.1.101/Snow/uploads/icons/'
		),
);*/

$GLOBALS['globals'] = array(
		'mysql'    => array(
				'host'          => 'localhost',
				'username'      => 'moon_ent',
				'password'      => 'P@ssd@ta13',
				'db'            => 'moondusk_enterprise'
		),
		'image'    => array(
				'dir_profile'      => 'uploads/profile/',
				'path_server_profile'      => 'http://192.168.1.101/Snow/uploads/profile/',
				'dir_attachment'      => 'uploads/attachment/',
				'path_server_attachment'      => 'http://192.168.1.101/Snow/uploads/attachment/',
				'path_server_icon'      => 'http://192.168.1.101/Snow/uploads/icons/'
		),
);





	

	require_once 'controller/Globals.php';
	require_once 'controller/DB.php';
	require_once 'controller/Input.php';
	require_once 'controller/Validation.php';
	
	require_once 'model/InquiryModel.php';
	
	
	
	
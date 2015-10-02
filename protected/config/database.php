<?php

// This is the database connection configuration.
return array(
	'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
	// uncomment the following lines to use a MySQL database
	
	'connectionString' => 'mysql:host=localhost;dbname=xechieuve',
	'emulatePrepare' => true,
	'username' => 'root',
	'password' => '',
	'charset' => 'utf8',
	
);
//return array(
//	'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
//	// uncomment the following lines to use a MySQL database
//	
//	'connectionString' => 'mysql:host=localhost;dbname=xeghephang_xgh',
//	'emulatePrepare' => true,
//	'username' => 'xeghephang_xgh',
//	'password' => '234qrtyew',
//	'charset' => 'utf8',
//	
//);
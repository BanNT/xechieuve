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
	//'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
	// uncomment the following lines to use a MySQL database
	
	//'connectionString' => 'mysql:host=112.213.87.14;dbname=xeghephang_xgh;unix_socket=/Applications/XAMPP/xamppfiles/var/mysql/mysql.sock',
	//'emulatePrepare' => true,
	//'username' => 'xeghephang_xgh',
	//'password' => '234qrtyew',
	//'charset' => 'utf8',
	
//);
<?php 

require('config.php');

// Site
$sitename 		= $config['site']['sitename'];
$url 			= $config['site']['url'];

// Template Path
$template 		= $config['template_path'];

// Style Path
$style_reset 	= $config['style_path']['reset'];
$style_desktop 	= $config['style_path']['desktop'];
$style_mobile 	= $config['style_path']['mobile'];

// Database
$hostname		= $config['database']['hostname'];
$username		= $config['database']['username'];
$password		= $config['database']['password'];
$dbname			= $config['database']['dbname'];

?>
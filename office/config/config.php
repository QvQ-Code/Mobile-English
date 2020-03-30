<?php

$config = [
    /* 
    *   Kumpulan informasi site 
    */
    'site' => [
     	'sitename'		=> 'Mobile English',
     	'url'			=> 'http://localhost/Mobile%20English/office/',
    ],

    /* 
    *   Lokasi file template 
    */
    'template_path'     => 'template/template.php',

    /* 
    *   Lokasi file css
    */
    'style_path' => [
        'reset'         => 'assets/css/normalize.css',
        'desktop'       => 'assets/css/desktop-style.css',
        'mobile'        => 'assets/css/mobile-style.css',
    ],

    /*
    *   Database key, host, username password dan lain-lain.
    */ 
    'database' => [
    	'hostname'	    => '127.0.0.1',
    	'username'		=> 'root',
    	'password'		=> '',
        'dbname'        => 'mobile_english_ebook',
    ]
];

return $config;

?>
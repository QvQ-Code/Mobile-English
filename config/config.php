<?php

$config = [
    /* 
    *   Kumpulan informasi site 
    */
    'site' => [
     	'sitename'		=> 'Mobile English',
     	'url'			    => 'http://localhost/Mobile%20English%20-%20Branch/',
    ],

    /* 
    *   Lokasi file css
    */
    'style_path' => [
        'reset'         => 'assets/css/custom/normalize.css',
        'desktop'       => 'assets/css/custom/desktop-style.css',
        'mobile'        => 'assets/css/custom/mobile-style.css',
    ],

    /*
    *   Database key, host, username password dan lain-lain.
    */ 
    'database' => [
        'hostname'      => '127.0.0.1',
        'username'      => 'root',
        'password'      => '',
        'dbname'        => 'mobile_english_ebook',
    ],

    /* 
    *   Email configuration 
    */
    'account' => [
        'email'         => 'bluexwhitedc100@gmail.com',
        'password'      => 'erenjeager11',
    ]
];

return $config;

?>
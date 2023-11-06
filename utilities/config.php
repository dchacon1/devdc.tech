<?php
// DEFINE CONSTANTS
// -------------------------------------------
define('ROOT', dirname(__DIR__, 1));
define('STREAMING_ENABLED', false);
define('PRODUCTION_DOMAIN', 'devdc.tech');

if(!str_contains($_SERVER['HTTP_HOST'], PRODUCTION_DOMAIN)) {
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
}

// Include Utilities
// $utilities = get_child_files(ROOT.'/utilities/');
// foreach($utilities as $file){
// 	if(is_file($file)) {
// 		include_once $file;
// 	}
// }
// unset($file, $utilities);

// Include Components
$components = get_child_files(ROOT.'/components/');
foreach($components as $file){
	if(is_file($file)) {
		include_once $file;
	}
}
unset($file, $components);

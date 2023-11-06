<?php
// DEFINE CONSTANTS
// -------------------------------------------
define('ROOT', dirname(__DIR__, 1));
define('STREAMING_ENABLED', false);
define('SITENAME', 'devdc');

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

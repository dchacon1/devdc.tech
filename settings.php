<?php
// DEFINE CONSTANTS
// -------------------------------------------
define('ROOT', __DIR__);

// Get all files that are direct children of specified directory
// -------------------------------------------
function get_child_files($pathToDirectory) {
    $childFiles = get_all_decendent_files($pathToDirectory);

    foreach ($childFiles as $index => $directChild) {
        if (is_array($directChild)) unset($childFiles[$index]);
    }

    return array_values($childFiles);
}

function get_all_decendent_files($pathToDirectory) {
    $pathToDirectory = is_array($pathToDirectory) ? dirname($pathToDirectory[0].'/') : $pathToDirectory;
    $allDirectChildren = scandir($pathToDirectory);
    $childFiles = [];

    foreach ($allDirectChildren as $index => $directChild) {
        if (is_dir($pathToDirectory.$directChild) && $directChild != '.' && $directChild != '..') {
            array_push($childFiles, get_all_decendent_files($pathToDirectory.$directChild.'/'));
        } else if (is_file($pathToDirectory.$directChild)) {
            array_push($childFiles, $pathToDirectory.$directChild);
        }
    }

    return array_values($childFiles);
}



// Include Utilities
$utilities = get_child_files(ROOT.'/utilities/');
foreach($utilities as $file){
	if(is_file($file)) {
		include_once $file;
	}
}
unset($file, $utilities);

// Include Components
$components = get_child_files(ROOT.'/components/');
foreach($components as $file){
	if(is_file($file)) {
		include_once $file;
	}
}
unset($file, $components);

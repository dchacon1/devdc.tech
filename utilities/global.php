<?php

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

function print_object($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

function convert_to_kebab_case($str)
{
    return strtolower(preg_replace('/[ _]+/', '-', $str));
}

function get_page()
{
	$uri = isset($_SERVER['REDIRECT_URL']) ? ltrim($_SERVER['REDIRECT_URL'],'/') : '';

	$page = 'get_page_not_found';

	if(isset($_SERVER['REDIRECT_URL'])) {
		foreach (scandir(ROOT.'/apps/') as $dir) {
			if($dir == rtrim(substr($uri, 5, strlen($uri)),'/') ) {
				@include_once ROOT.'/apps/'.$dir.'/'.$dir.'.php';

				$page = 'get_'.str_replace('-', '_', convert_to_kebab_case($dir));
				break;
			}
		}

		if(strpos($page, 'get_page_not_found') !== false) {
			foreach (get_child_files(ROOT.'/views/') as $file) {
				if(rtrim(basename($file),'.php') == $uri) {
					@include_once ROOT.'/views/'.basename($file);

					$page = 'get_'.str_replace('-', '_', convert_to_kebab_case(rtrim(basename($file),'.php')));
					break;
				}
			}
		}
	}
	else {
		@include_once ROOT.'/views/home.php';
		$page = 'get_home';
	}

	$page();
}

function get_page_content()
{
	return $GLOBALS['page_content'];
}

function get_page_styles()
{
	$styles = "";

	foreach ($GLOBALS['page_styles'] as $stylesheet) {
        export_app_asset_to_public($stylesheet);
		$styles.= '<link rel="stylesheet" href="'.str_replace( ROOT, '', sanitize_asset_url($stylesheet) ).'">'."\n";
	}

	return $styles;
}

function get_page_scripts()
{
	$scripts = "";

	foreach ($GLOBALS['page_scripts'] as $script) {
        export_app_asset_to_public($script);
		$scripts.= '<script src="'.str_replace( ROOT, '', sanitize_asset_url($script) ).'"></script>'."\n";
	}

	return $scripts;
}

function sanitize_asset_url($url)
{
	$url = rawurlencode($url);
	$url = str_replace( '%2F', '/', $url );
	$url = str_replace( '%40', '@', $url );
	$url = str_replace( 'https%3A', 'https:', $url );
	$url = str_replace( 'http%3A', 'http:', $url );
	return $url;
}

function export_app_asset_to_public($assetPath)
{
    if(!str_contains($assetPath, SITENAME)) return false;

    if (!file_exists('/public'.str_replace( ROOT, '', sanitize_asset_url($assetPath) ))) {
        mkdir(dirname(ROOT.'/public'.str_replace( ROOT, '', sanitize_asset_url($assetPath) )), 0777, true);
    }

    copy(ROOT.str_replace( ROOT, '', sanitize_asset_url($assetPath) ), ROOT.'/public'.str_replace( ROOT, '', sanitize_asset_url($assetPath) ));
}
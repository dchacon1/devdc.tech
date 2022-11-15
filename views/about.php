<?php
function get_about()
{
	set_home_meta();

	$GLOBALS['page_content'] = set_home_content();
}

function set_home_meta()
{
	$GLOBALS['page_scripts'] = [];

	$GLOBALS['page_styles'] = [
		ROOT.'/assets/css/style.css'
	];

	$GLOBALS['page_title'] = 'Resume';
}

function set_home_content()
{
    ob_start(); ?>

<div class="">
	about page
</div>
<?php
    return ob_get_clean();
}

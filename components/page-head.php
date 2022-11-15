<?php
function get_page_head()
{
    ob_start(); ?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="robots" content="noindex, nofollow" />
	<link rel="shortcut icon" type="image/png" sizes="32x32" href="/assets/images/favicon.png">

	<title>devdc.tech<?= isset($GLOBALS['page_title']) ? ' | ' . $GLOBALS['page_title'] : '' ?></title>

	<?= get_page_styles(); ?>
<?php
    return ob_get_clean();
}

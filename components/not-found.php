<?php
function get_page_not_found()
{
	$GLOBALS['page_scripts'] = [];

	$GLOBALS['page_styles'] = [
		ROOT.'/assets/css/style.css',
		ROOT.'/assets/css/not-found.css'
	];

	$GLOBALS['page_title'] = 'Page Not Found';

	$GLOBALS['page_content'] = set_page_not_found();
}

function set_page_not_found(){
	ob_start(); ?>

<main>
	<section>
		<h1>Not Found</h1>
		<p>We are sorry, but the page you are looking for doesn't seem to exist. <a href="/">Go home.</a> </p>
	</section>
</main>

<?php
	return ob_get_clean();
}

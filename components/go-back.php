<?php
function get_back_home_button(){
	ob_start(); ?>

<div class="" style="padding: 20px; font-family: sans-serif; font-size: 16px;">
	<a href="/">Back to resume</a>
</div>

<?php
	return ob_get_clean();
}

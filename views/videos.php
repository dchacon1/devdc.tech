<?php
$queries = array();
parse_str($_SERVER['QUERY_STRING'], $queries);

if(count($queries) > 0 && isset($queries["video_name"])) {
    $fileName = dirname(__DIR__, 1).'/videos/'.$queries["video_name"].'.mp4';

    if(file_exists($fileName) && STREAMING_ENABLED) {
        include dirname(__DIR__, 1). "/utilities/VideoStream.php";
        $stream = new VideoStream($fileName);
        $stream->start();
    }
    else {
        echo 'Error';
    }

    exit;
}



function get_videos()
{
	set_videos_meta();

	$GLOBALS['page_content'] = set_videos_content();
}

function set_videos_meta()
{
	$GLOBALS['page_scripts'] = [
        // ROOT.'/assets/js/home.js'
    ];

	$GLOBALS['page_styles'] = [
		// ROOT.'/assets/css/home.css'
	];

	$GLOBALS['page_title'] = 'Videos';
}

function set_videos_content()
{
    ob_start(); ?>
<form method="get" action="/videos/">
    <h1>Enter the name of the video you wish to play</h1>
    <input type="text" name="video_name">
    <button>Submit</button>
</form>

<?php
    return ob_get_clean();
}
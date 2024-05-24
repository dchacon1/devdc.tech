<?php
$notFound = false;
$queries = array();
parse_str($_SERVER['QUERY_STRING'], $queries);

// Returns a file size limit in bytes based on the PHP upload_max_filesize
// and post_max_size
function file_upload_max_size() {
    static $max_size = -1;

    if ($max_size < 0) {
        // Start with post_max_size.
        $post_max_size = parse_size(ini_get('post_max_size'));
        if ($post_max_size > 0) {
            $max_size = $post_max_size;
        }

        // If upload_max_size is less, then reduce. Except if upload_max_size is
        // zero, which indicates no limit.
        $upload_max = parse_size(ini_get('upload_max_filesize'));
        if ($upload_max > 0 && $upload_max < $max_size) {
            $max_size = $upload_max;
        }
    }
    return $max_size;
}

function parse_size($size) {
    $unit = preg_replace('/[^bkmgtpezy]/i', '', $size); // Remove the non-unit characters from the size.
    $size = preg_replace('/[^0-9\.]/', '', $size); // Remove the non-numeric characters from the size.
    if ($unit) {
        // Find the position of the unit in the ordered string which is the power of magnitude to multiply a kilobyte by.
        return round($size * pow(1024, stripos('bkmgtpezy', $unit[0])));
    }
    else {
        return round($size);
    }
}



if(!STREAMING_ENABLED) {
    $notFound = true;
}



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json');

    if($_SERVER['CONTENT_LENGTH'] >= file_upload_max_size()){
        http_response_code(413);
        echo json_encode(['status'=>413,'message'=>'Upload failed. File too large.']);
        exit;
    }

    if(empty($_FILES)){
        http_response_code(500);
        echo json_encode(['status'=>500,'message'=>'Upload failed. Unknown error.']);
        exit;
    }

    $asset = $_FILES['file_data'];
    //Stores the filename as it was on the client computer.
    $assetName = $asset['name'];
    //Stores the filetype e.g image/jpeg
    $assetType = $asset['type'];
    //Stores any error codes from the upload.
    $assetError = $asset['error'];
    //Stores the tempname as it is given by the host when uploaded.
    $assetTemp = $asset['tmp_name'];

    if (!is_dir(dirname(__DIR__, 1).'/uploads/')) {
        mkdir(dirname(__DIR__, 1).'/uploads/', 0777, true);
    }

    $assetPath = dirname(__DIR__, 1).'/uploads/';
    $extensionsAllowed = ['png','jpg','jpeg','tiff','tif','pdf','webp','mp4','mp3','acc'];
    $fileExtension =  pathinfo($assetName, PATHINFO_EXTENSION);

    if(array_search($fileExtension, $extensionsAllowed) === false) {
        http_response_code(415);
        echo json_encode(['status'=>415,'message'=>'Upload failed. File type not allowed.']);
        exit;
    }



    if(is_uploaded_file($assetTemp)) {
        if(move_uploaded_file($assetTemp, $assetPath . $assetName)) {
            echo json_encode(['status'=>200,'message'=>'Upload success!']);
            exit;
        }
        else {
            echo json_encode(['status'=>500,'message'=>'Failed to move your file.']);
            exit;
        }
    }
    else {
        echo json_encode(['status'=>500,'message'=>'Failed to upload your file.']);
        exit;
    }

}
else {

    if(count($queries) > 0 && isset($queries["asset_name"])) {
        $fileName = dirname(__DIR__, 1).'/uploads/'.$queries["asset_name"].'.mp4';

        if(file_exists($fileName)) {
            include dirname(__DIR__, 1). "/utilities/VideoStream.php";
            $stream = new VideoStream($fileName);
            $stream->start();
        }
        else {
            $notFound = true;
        }
    }
}


if(!$notFound) {
    function get_videos()
    {
        set_videos_meta();

        $GLOBALS['page_content'] = set_videos_content();
    }

    function set_videos_meta()
    {
        $GLOBALS['page_scripts'] = [
            'https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js',
            'https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js'
        ];

        $GLOBALS['page_styles'] = [
            // ROOT.'/assets/css/home.css'
        ];

        $GLOBALS['page_title'] = 'Videos';
    }

    function set_videos_content()
    {
        ob_start(); ?>

    <style>
        .progress-bar {
            width: 100%;
            max-width: 400px;
            height: 25px;
            border-radius: 5px;
            position: relative;
            overflow: hidden;
        }
        .progress-bar__gradient {
            display: block;
            width: 0%;
            height: 100%;
            position: absolute;
            left: 0;
            top: 0;
            background: cyan;
        }
        .progress-bar__text {
            display: block;
            width: 100%;
            text-align: center;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
        }

        #form-message:empty {
            display: none;
        }
    </style>


    <form id="upload-form" method="post" action="/videos/" enctype="multipart/form-data">
        <h1>Upload File</h1>

        <label for="file-name">File name</label><br>
        <input id="file-name" type="file" name="file_data">
        <br>
        <br>
        <button type="submit" id="upload-form-btn">Upload</button>

        <p aria-live="polite"><span id="form-message"></span></p>
    </form>
    <p class="progress-bar" aria-live="assertive">
        <span class="progress-bar__gradient"></span>
        <span class="progress-bar__text"></span>
    </p>


    <form method="get" action="/videos/">
        <h1>Enter the name of the video you wish to play</h1>
        <input type="text" name="asset_name">
        <button>Submit</button>
    </form>

    <script defer>
        (function() {
            let uploadFormButton = document.querySelector('#upload-form button'),
                progressBar = document.querySelector('.progress-bar__gradient'),
                progressBarText = document.querySelector('.progress-bar__text'),
                formMessage = document.querySelector('#form-message');

            uploadFormButton.addEventListener('click', function(e) {
                e.preventDefault();

                $('#upload-form').ajaxSubmit({
                    beforeSubmit: function(formData, formObject, formOptions) {
                        formMessage.textContent = '';
                    },
                    uploadProgress: function(event, position, total, percentComplete) {
                        progressBar.style.width = percentComplete+'%';
                        progressBarText.textContent = percentComplete+'%';

                    },
                    success: function(response) {
                        if(response.status == 200) document.getElementById('upload-form').reset();

                        formMessage.textContent = response.message;
                        progressBar.style.width = '0%';
                        progressBarText.textContent = '';

                    },

                    error: function(xhr, ajaxOptions, thrownError) {
                        formMessage.textContent = xhr.responseJSON.message;
                        progressBar.style.width = '0%';
                        progressBarText.textContent = '';
                    }
                })
            })
        })()

    </script>
    <?php
        return ob_get_clean();
    }
}

else {
    include dirname(__DIR__, 1)."/views/not-found.php";
    get_page_not_found();
}
<?php
error_reporting(0);
$dateTime="";
$name= $_FILES['file_video']['name'];

$tmp_name= $_FILES['file_video']['tmp_name'];

$position= strpos($name, ".");

$fileextension= substr($name, $position + 1);

$fileextension= strtolower($fileextension);


if (isset($name)) {

$path= 'Uploads/videos/';

    if (empty($name)) {
        $post_data = array(
            'status_code' => "201",
            'type' => "Failed",
            'msg' => "Please choose a file",
            'value' => ""

        );
    }

    else if (!empty($name)){

        if (($fileextension == "jpg") || ($fileextension == "png")) {
            $path= 'Uploads/images/';
            if (move_uploaded_file($tmp_name, $path.$name)) {
                $post_data = array(
                    'status_code' => "200",
                    'type' => "Success",
                    'msg' => "Image Upload Successfully!!",
                    'value' => $path.$name

                );
            }else{
                $post_data = array(
                    'status_code' => "201",
                    'type' => "Failed",
                    'msg' => "Image Upload Failed!!"

                );
            }
        }

        else if (($fileextension == "mp4") || ($fileextension == "ogg") || ($fileextension == "webm")) {
            if (move_uploaded_file($tmp_name, $path.$name)) {
                $post_data = array(
                        'status_code' => "200",
                        'type' => "Success",
                        'msg' => "Video Upload Successfully!!",
                        'value' => $path.$name

                    );

            }else{
                $post_data = array(
                    'status_code' => "201",
                    'type' => "Failed",
                    'msg' => "Video Upload Failed!!"

                );
            }
        }
    }
}

print json_encode($post_data);

function getTime()
{
    $Date = "";
    date_default_timezone_set("Asia/Dhaka");
    return $Time = date("H:i:s");
}
?>
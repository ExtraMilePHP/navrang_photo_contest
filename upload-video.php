<?php
session_start();
include_once 'dao/config.php';
include_once '../add_report.php';
$target_dir = "uploads/";
$random_node=rand(1,500).rand(1,1000);
$filenameNew=$random_node. basename($_FILES["file"]["name"]);
$target_file = $target_dir.$filenameNew;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
$userid=$_POST["userid"];
$organizationId=$_POST["organizationId"];
$sessionId=$_SESSION['sessionId'];
$email=$_SESSION['email'];
$name=$_POST["name"];
$business=$_POST["business"];
$category=$_POST["category"];
$location=$_POST["location"];


// Check if file already exists
if (file_exists($target_file)) {
    $error= "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["file"]["size"] > 10485760) {
    $error= "File is Too Large Only 10 MB Allowed <Br>";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "mov" && $imageFileType != "mp4" && $imageFileType != "avi"
&& $imageFileType != "3gp" ) {
    $error= "Sorry, only 3gp, mov, mp4 and avi files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo json_encode(array("success"=>"false","message"=>$error));
// if everything is ok, try to upload file
} else {
    if(function_exists('date_default_timezone_set')) {
        date_default_timezone_set("Asia/Kolkata");
    }
    $timestamp = date('Y-m-d H:i:s');
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        $query="INSERT INTO `uploads`(`userid`,`organizationId`,`sessionId`,`video`,`type`, `name`,`email`, `business`,`category`,`location`,`likes`,`timestamp`) VALUES ('$userid','$organizationId','$sessionId','$filenameNew','video','$name','$email','$business','$category','$location','0','$timestamp')";
        if(mysqli_query($con,$query)){
            function successResponse($tools){
                echo json_encode(array("success"=>true,"isdemo"=>$tools["isdemo"],"reportId"=>$tools["reportId"]));
            }
            $data=["points"=>0,"time"=>"NA"];
            addReport($data);
        }else{
            echo json_encode(array("success"=>false,"message"=>mysqli_error($con)));
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
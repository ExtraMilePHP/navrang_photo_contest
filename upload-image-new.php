<?php 
ob_start();
session_start();
include_once 'dao/config.php';
include_once '../add_report.php';

$userid=$_POST["userid"];
$organizationId=$_POST["organizationId"];
$sessionId=$_SESSION['sessionId'];
$email=$_SESSION['email'];
$name=$_POST["name"];
$business=$_POST["business"];
$location=$_POST["location"];
$category=$_POST["category"];

$img = new Imagick();
$img->readImage($_FILES["file"]["tmp_name"]);
$img->setImageCompression(imagick::COMPRESSION_JPEG);
$img->setImageCompressionQuality(50);
$img->stripImage();

$random_node=rand(1,500).rand(1,1000);
$filename=$random_node.basename($_FILES["file"]["name"]);
if($img->writeImage('uploads/'.$filename)){
    $query="INSERT INTO `uploads`(`userid`,`organizationId`,`sessionId`,`video`,`type`,`name`, `email`,`business`,`category`, `location`,`likes`,`timestamp`) VALUES ('$userid','$organizationId','$sessionId','$filename','image','$name','$email','$business','$category','$location','0','$timestamp')";
    if(mysqli_query($con,$query)){
        function successResponse($tools){
            echo json_encode(array("success"=>true,"isdemo"=>$tools["isdemo"],"reportId"=>$tools["reportId"]));
        }
        $data=["points"=>0,"time"=>"NA"];
        addReport($data);
    }else{
        echo json_encode(array("success"=>false,"message"=>mysqli_error($con)));
    }
}


?>
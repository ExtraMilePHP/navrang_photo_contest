<?php
session_start();
include_once('dao/config.php');

$userId=$_SESSION['userId'];
$organizationId=$_SESSION['organizationId'];
$report_id=$_POST["report_id"];


$query="UPDATE `uploads` SET likesid='$report_id' where userid='$userId' and organizationId='$organizationId' order by id desc limit 1";
    if(mysqli_query($con,$query)){
        echo "true";
    }else{
        echo "something went wrong".mysqli_error($con);
    }


?>
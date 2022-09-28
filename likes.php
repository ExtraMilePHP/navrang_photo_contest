<?php
include_once('dao/config.php');
include_once '../add_report.php';
session_start();
$post_id=$_POST["post_id"];
$user=$_POST["user"];
$organizationId=$_SESSION['organizationId'];
$report_id=$_POST["report_id"];
$token=$_SESSION['token'];

$check="select * from likes where post='$post_id' and user='$user'";
$check=mysqli_query($con,$check);
$check=mysqli_num_rows($check);

if($check==0){
    $query="INSERT INTO `likes`(`post`, `user`) VALUES ('$post_id','$user')";
    if(mysqli_query($con,$query)){
        $fetch="select * from uploads where id='$post_id'";
        $fetch=mysqli_query($con,$fetch);
        $fetch=mysqli_fetch_object($fetch);
        $fetch=$fetch->likes;
        $fetch=$fetch+1;
        $update="UPDATE `uploads` SET `likes`='$fetch' where id='$post_id'";
        if(mysqli_query($con,$update)){
            $data=["points"=>$fetch,"reportId"=>$report_id];
            $update=updateReport($data);
            if($update){
              echo "true";
              }else{
              echo "failed";
            }
        }else{
            echo "something went wrong".mysqli_error($con);
        }
    }else{
        echo "something went wrong".mysqli_error($con);
    }
}else{
    echo "false";
}


?>
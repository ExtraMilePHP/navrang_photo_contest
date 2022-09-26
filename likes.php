<?php
include_once('dao/config.php');
session_start();
$post_id=$_POST["post_id"];
$user=$_POST["user"];
$organizationId=$_POST["organizationId"];
$report_id=$_POST["report_id"];
$token=$_SESSION['token'];


$query="INSERT INTO `likes`(`post`, `user`,`organizationId`) VALUES ('$post_id','$user','$organizationId')";
    if(mysqli_query($con,$query)){
        $fetch="select * from uploads where id='$post_id'";
        $fetch=mysqli_query($con,$fetch);
        $fetch=mysqli_fetch_object($fetch);
        $fetch=$fetch->likes;
        $fetch=$fetch+1;
        $update="UPDATE `uploads` SET `likes`='$fetch' where id='$post_id'";
        if(mysqli_query($con,$update)){
            $curl = curl_init();
            $certificate_location = '../cacert.pem';
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, $certificate_location);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, $certificate_location);
            $data = json_encode(["points"=>$fetch]);
            curl_setopt_array($curl, array(
              CURLOPT_URL => 'https://extramileplay.com/api/game-server/report/'.$report_id,
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => '',
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => 'PUT',
              CURLOPT_POSTFIELDS =>$data,
              CURLOPT_HTTPHEADER => array(
                'client-secret: c8cd8589f49601a287b0e269f43cca07a31858c91918c1479e325b96a1d1d239',
                'Content-Type: application/json',
                'Authorization: Bearer ' . $token
              ),
            ));            
            $response = curl_exec($curl);
            curl_close($curl);
            $message=json_decode($response,true)['message'];
            echo "true";
        }else{
            echo "something went wrong".mysqli_error($con);
        }
    }else{
        echo "something went wrong".mysqli_error($con);
    }


?>
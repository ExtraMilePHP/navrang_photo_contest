<?php
include_once 'dao/config.php';
$id=$_GET["id"];
$fallback=$_GET["fallback"];
$table=$_GET["table"];
$query="DELETE  FROM $table where id='$id'";
if(mysqli_query($con,$query)){
    header("Location:".$fallback);
}else{
    echo "something went wrong ".mysqli_query($con);
}
?>
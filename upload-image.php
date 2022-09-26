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
 $form_length=1;
 $matching=null;
 $images_names=array();
 $images_types_array=array();
 for($i=0; $i<$form_length; $i++){
     $target_dir = "uploads/";
     $image_info = getimagesize($_FILES["file"]["tmp_name"]);
     $image_width = $image_info[0];
     $image_height = $image_info[1];
     $image_type=null;
     if($image_width < $image_height){
         $image_type="v";
         $image_width_r=338;
         $image_height_r=229;
     }else{
         $image_type="h";
         $image_width_r=338;
         $image_height_r=229;
     }
     
     $posx=15;
     $posy=40;
     $random_node=rand(1,500).rand(1,1000);
  $filename=$random_node.basename($_FILES["file"]["name"]);
  $source_file = $_FILES["file"]["tmp_name"];
  $target_file = $target_dir .$random_node.basename($_FILES["file"]["name"]);
  list($img_width,$img_height) = getimagesize($source_file);  
  $im = imagecreatetruecolor($image_width_r, $image_height_r) or die('Cannot Initialize new GD image stream');
 
  if (exif_imagetype($source_file) == IMAGETYPE_JPEG) {
    $img_source = imagecreatefromjpeg($source_file);
    $get_type="jpg";
}else if(exif_imagetype($source_file) == IMAGETYPE_PNG){
    $img_source = imagecreatefrompng($source_file);
    $get_type="png";
}else{
    echo "sorry we only support jpeg and png format";
}
 
  imagecopyresampled($im, $img_source, 0, 0, 0, 0, $image_width_r, $image_height_r, 
  $img_width, $img_height);
 // EXIF BUG FIXED 
 $exif = exif_read_data($source_file); // exif bug fixed webgradez error 1025
 if (!empty($exif['Orientation'])) {
     switch ($exif['Orientation']) {
         case 3:
         $im = imagerotate($im, 180, 0);
         $choke="case 3";
         $image_type="H";
         break;
         case 6:
         $im = imagerotate($im, -90, 0);
         $choke="case 6";
         $image_type="v";
         break;
         case 8:
         $im = imagerotate($im, 90, 0);
         $choke="case 9";
         break;
         default:
         $im = $im;
         $choke="case default";
     } 
 }
 // EXIF BUG FIXED
 $images_names[]=$filename;
 $images_types_array[]=$image_type;
     if(imagejpeg($im,$target_file, 95)){
           imagedestroy($im);  
           imagedestroy($img_source);
           $matching.="1";
     }else{
         echo "failed to upload".$i." c=".$get_main_count['count'];
     }
 }
 
 $image_one=$images_names[0];
 $type_one=$images_types_array[0];
 $config=$form_length;
 $timestamp = date('Y-m-d H:i:s');
 
 if(strlen($matching) == $config){
    $query="INSERT INTO `uploads`(`userid`,`organizationId`,`sessionId`,`video`,`type`,`name`, `email`,`business`,`category`, `location`,`likes`,`timestamp`) VALUES ('$userid','$organizationId','$sessionId','$image_one','image','$name','$email','$business','$category','$location','0','$timestamp')";
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

<?php
ob_start();
session_start();
error_reporting(0);

include_once 'dao/config.php';
include_once '../check-rating.php';
$isRated=check_rating();
$userId=$_SESSION['userId'];
$organizationId=$_SESSION['organizationId'];
$sessionId=$_SESSION['sessionId'];
if(empty($_SESSION["userId"])){
  header("Location:index.php");
}
if($_SESSION['firstName']=="demo"){
  $demoprint="var isdemo=true;";
$fullname=$_SESSION["fullname"];

}else{
  $demoprint="var isdemo=false;";
$fullname=$_SESSION["firstName"];
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Navrang Photo Contest</title> 
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link href="css/style-one.css" type="text/css" rel="stylesheet">
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="js/popImg.js"></script>

          
    </head>
    <body>
<?php include("../actions-default.php");  back("index.php?save");?>
    <div class="container-fluid" style="background:white;">
            <div class="row">
            </div>
        </div>
        <div class="container-fluid">
            <div class="row ">
              <div class="col-md-6 col-md-offset-3" >


              <div class="col-md-12 col-xs-12 text-center">
              <img src="images/welcome-logo.png" class="" style="width: 50%; margin:0 auto;"/>
              </div>

              <div class="col-md-12 text-center first-title">
              <span style="color:#e56063;">Illuminate your day with festive colours </span><br>
Join in with your colleagues to celebrate NAVRANG with style. Dress up in the colour of the day or pose with items/props that best depict the theme. It's time to get your creative juices flowing!<br>
<span style="font-size:20px; margin-top:10px; float:left;">Make sure you select the right tab below and upload your photos of the day. VOTING is open too!</span>
</div>
         <!--     <div class="col-md-8 col-md-offset-2 text-center contest">
              Top picks will be featured on our social media!</span>
              </div> -->
              <div class="col-md-12" style="margin-top:15px;">
              <div class="col-md-10 col-md-offset-1">
           <!--   <div class="form-title form-container">
              Upload below by filling in your details
              </div> -->
              <form class="form-horizontal" id="myform" style="">
  <div class="form-group">
    <label class="control-label col-sm-5" for="email">Your Name</label>
    <div class="col-sm-7">
      <input type="text" class="form-control" id="name" placeholder="your name" value='<?php echo $fullname;?>' required>
    </div>
  </div>
  <div class="form-group" style="display:none;">
    <label class="control-label col-sm-5" for="email">Your Location</label>
    <div class="col-sm-7">
      <input type="text" class="form-control" id="location" value="NULL" placeholder="Your Location" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-5" for="email">Outfit of the Day</label>
    <div class="col-sm-7">
    <select id="category" name="unit" class="text-nav form-control text-center" required>
                                                   <option value="day1" selected>Day 1 - October 7 - Yellow</optioin>
                                                   <option value="day2">Day 2 - October 8 - Green</optioin>
                                                   <option value="day3">Day 3 - October 9 - Grey</optioin>
                                                   <option value="day4">Day 4 - October 10 - Orange</optioin>
                                                   <option value="day5">Day 5 - October 11 - White</optioin>
                                                   <option value="day6">Day 6 - October 12 - Red</optioin>
                                                   <option value="day7">Day 7 - October 13 - Royal Blue</optioin>
                                                   <option value="day8">Day 8 - October 14 - Pink</optioin>
                                                   <option value="day9">Day 9 - October 15 - Purple</optioin>
    </select>	
    </div>
  </div>
  <div class="form-group" style="display:none;">
    <label class="control-label col-sm-5" for="email">Instead of title your talent</label>
    <div class="col-sm-7">
      <input type="text" class="form-control" id="business" placeholder="Title" value="NULL" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-5" for="email">Upload Photo</label>
    <div class="col-sm-7">
      <input type="file" class="form-control" id="file" placeholder="Your Location" required>
    </div>
    <label class="control-label col-md-12" for="email" style="font-size:14px; text-align:right;">Allowed Photo Formats - PNG, JPG <br>
  </div>
  <div class="progress" style="display:none;">
	  <div class="progress-bar" role="progressbar" aria-valuenow="70"
	  aria-valuemin="0" aria-valuemax="100" style="width:70%">
		70%
	  </div>
	</div>
  <div class="form-group">
    <div class="col-md-12 text-center">
      <button type="submit" class="btn btn-lg btn-default video-upload" style="margin:0 auto; margin-top:5px; background-image: linear-gradient(to right, #E25569 , #FB9946); color:white;">Upload</button>
      <label class="control-label col-md-12" for="email" style="font-size:14px; text-align:center;">You can LIKE any post only once</label>
  
    </div>
  </div>
</form>
              </div>
              </div>
</div>
            </div>
        </div>

        <div class="container-fluid" style="margin-top:20px;">
        <div class="row">
        <div class="col-md-8 col-md-offset-2">
        <div class="col-md-3 col-xs-6 text-center">
          <a href="welcome.php?find=ALL">
        <div class="cat_container">
        <div class="img-container"><img src="img/colors/0.png"/></div><div class="title-container">All</div>
        </div>
          </a>
        </div>

        <div class="col-md-3 col-xs-6 text-center">
          <a href="welcome.php?find=day1">
        <div class="cat_container">
        <div class="img-container"><img src="img/colors/1.png"/></div><div class="title-container">DAY 1</div>
        </div>
          </a>
        </div>

        <div class="col-md-3 col-xs-6 text-center">
          <a href="welcome.php?find=day2">
        <div class="cat_container">
        <div class="img-container"><img src="img/colors/2.png"/></div><div class="title-container">DAY 2</div>
        </div>
          </a>
        </div>

        <div class="col-md-3 col-xs-6 text-center">
          <a href="welcome.php?find=day3">
        <div class="cat_container">
        <div class="img-container"><img src="img/colors/3.png"/></div><div class="title-container">DAY 3</div>
        </div>
          </a>
        </div>
        </div>
        </div>
        </div>

        <div class="container-fluid" style="margin-top:20px;">
        <div class="row">
        <div class="col-md-6 col-md-offset-3">
        <div class="col-md-4 col-xs-6 text-center">
          <a href="welcome.php?find=day4">
        <div class="cat_container">
        <div class="img-container"><img src="img/colors/4.png"/></div><div class="title-container">DAY 4</div>
        </div>
          </a>
        </div>

        <div class="col-md-4 col-xs-6 text-center">
          <a href="welcome.php?find=day5">
        <div class="cat_container">
        <div class="img-container"><img src="img/colors/5.png"/></div><div class="title-container">DAY 5</div>
        </div>
          </a>
        </div>

        <div class="col-md-4 col-xs-6 text-center">
          <a href="welcome.php?find=day6">
        <div class="cat_container">
        <div class="img-container"><img src="img/colors/6.png"/></div><div class="title-container">DAY 6</div>
        </div>
          </a>
        </div>
        </div>
        </div>
        </div>

        <div class="container-fluid" style="margin-top:20px;">
        <div class="row">
        <div class="col-md-6 col-md-offset-3">
        <div class="col-md-4 col-xs-6 text-center">
          <a href="welcome.php?find=day7">
        <div class="cat_container">
        <div class="img-container"><img src="img/colors/7.png"/></div><div class="title-container">DAY 7</div>
        </div>
          </a>
        </div>

        <div class="col-md-4 col-xs-6 text-center">
          <a href="welcome.php?find=day8">
        <div class="cat_container">
        <div class="img-container"><img src="img/colors/8.png"/></div><div class="title-container">DAY 8</div>
        </div>
          </a>
        </div>

        <div class="col-md-4 col-xs-6 text-center">
          <a href="welcome.php?find=day9">
        <div class="cat_container">
        <div class="img-container"><img src="img/colors/9.png"/></div><div class="title-container">DAY 9</div>
        </div>
          </a>
        </div>
        </div>
        </div>
        </div>


        

        <div class="container-fluid">
         <div class="row" style="margin-top:0px;">
         <?php 
$q=$_GET["q"];

$limit=8; //////////// pagination limit //////////////////////
$pagefeed=$q*$limit;
if(empty($q)){
    $pagefeed=0;
}
$runpos=0;

    if($_GET["find"]=="day1"){
      $find="where category='day1'";
      $findParam="&find=day1";
      $eq=1;
    }else if($_GET["find"]=="day2"){
      $find="where category='day2'";
      $findParam="&find=day2";
      $eq=2;
    }else if($_GET["find"]=="day3"){
      $find="where category='day3'";
      $findParam="&find=day3";
      $eq=3;
    }else if($_GET["find"]=="day4"){
      $find="where category='day4'";
      $findParam="&find=day4";
      $eq=4;
    }else if($_GET["find"]=="day5"){
      $find="where category='day5'";
      $findParam="&find=day5";
      $eq=5;
    }else if($_GET["find"]=="day6"){
      $find="where category='day6'";
      $findParam="&find=day6";
      $eq=6;
    }else if($_GET["find"]=="day7"){
      $find="where category='day7'";
      $findParam="&find=day7";
      $eq=7;
    }else if($_GET["find"]=="day8"){
      $find="where category='day8'";
      $findParam="&find=day8";
      $eq=8;
    }else if($_GET["find"]=="day9"){
      $find="where category='day9'";
      $findParam="&find=day9";
      $eq=9;
    }else if($_GET["find"]=="ALL"){
      $find="";
      $findParam="&find=ALL";
      $eq=0;
    }else{
      $findParam="";
    }

    if($find==""){
      $org="where organizationId='$organizationId' and sessionId='$sessionId'";
    }else{
      $org=" and organizationId='$organizationId' and sessionId='$sessionId'";
    }

$query="select * from uploads $find $org order by id desc limit $pagefeed,$limit";
$query=mysqli_query($con,$query);
$check_data=mysqli_num_rows($query);

while($get=mysqli_fetch_array($query)){
  $post_id=$get["id"];
                   $likes="select * from likes where post='$post_id' and user='$userId'"; 
                   $likes=mysqli_query($con,$likes);
                   $likes=mysqli_num_rows($likes);
                    if($likes>0){
                        $likes="true";
                    }else{
                        $likes="false";
                    }

                    $check_user="select * from uploads where id='$post_id' and userid='$userId' and organizationId='$organizationId' and sessionId='$sessionId' limit 1";
                    $check_user=mysqli_query($con,$check_user);
                    $check_user=mysqli_num_rows($check_user);
                    if($check_user==1){
                      $deleteAccess='<a href="delete.php?id='.$post_id.'&table=uploads&fallback=welcome.php"><img src="img/remove.png" style="cursor:pointer;width:30px; height:30px; position:absolute; right:16px; top:0px; background:black; border-radius:50%;" class="delete" post_id='.$post_id.'/></a>';
                    }else{
                      $deleteAccess='';
                    }

                    if($get["type"]=="video"){
                        echo '<div class="col-md-3 video-container"  style="position:relative;">
                        <video controls controlsList="nodownload">
                      <source src="uploads/'.$get["video"].'" type="video/mp4">
                      Your browser does not support the video tag.
                      </video>
                      <div class="col-md-12 operation">
                      <div class="row">
                      <div class="col-md-4 col-xs-3" style="padding: 5px 7px;"><img src="img/like_new.png" class="vote like-image" post_id="'.$get["id"].'" report_id="'.$get["likesid"].'" status="'.$likes.'" /><span style="display:inline-block;">&nbsp;'.$get["likes"].'</span> </div>
                      <div class="col-md-8 col-xs-9"  style="text-align:right; padding: 5px 7px;">'.$get["name"].'</div>
                      <div class="col-md-12" style="text-align:right; padding-bottom:3px;">'.$get["business"].'</div>
                      </div>
                      </div>
                      '.$deleteAccess.'
                        </div>';
                    }
                    if($get["type"]=="image"){
                       echo '              <div class="col-md-3 video-container"  style="position:relative;">
                       <img src="uploads/'.$get["video"].'" class="image-fix"/>
                     <div class="col-md-12 operation">
                     <div class="row">
                     <div class="col-md-4 col-xs-3" style="padding: 5px 7px;"><img src="img/like_new.png" class="vote like-image" post_id="'.$get["id"].'" report_id="'.$get["likesid"].'" status="'.$likes.'" /><span style="display:inline-block;">&nbsp;'.$get["likes"].'</span> </div>
                     <div class="col-md-8 col-xs-9"  style="text-align:right; padding: 5px 7px;">'.$get["name"].'</div>
                     <!--<div class="col-md-12" style="text-align:right; padding-bottom:3px;">'.$get["business"].'</div>-->
                     </div>
                     </div>
                     '.$deleteAccess.' 
                     </div>';
                    }

}

if($check_data==0){
     echo '<div class="well text-center" style="margin-top:15px; margin-bottom:20px;"> There is no post in this Category</div>';
}
?>
           
          
              
         </div>
        </div>
        <div class="pagination-container text-center">
  <ul class="pagination">
<?php 
$page=mysqli_query($con,"select * from uploads $find $org");
$page=mysqli_num_rows($page);
$pageCount=$page/$limit;
echo '<li class="page-item disabled"><a class="page-link" href="#" tabindex="-1">Previous</a></li>';
for($i=0; $i<$pageCount; $i++){
    if($q==$i){
        echo '<li class="page-item active"><a class="page-link" href="welcome.php?'.$findParam.'&q='.$i.'">'.$i.'</a></li>';
    }else{
        echo '<li class="page-item"><a class="page-link" href="welcome.php?'.$findParam.'&q='.$i.'">'.$i.'</a></li>';
    }    
}
    echo '<li class="page-item disabled"><a class="page-link" href="">Next</a></li>';
?>
  </ul>
</div>
<div class="container-fluid">
  <?php 
if($_SESSION["sessionId"] != "demobypass"){
  if(!$isRated){
       echo '<div class="col-md-12 text-center"><button class="btn next" style="text-align: center; width: 187px;"onclick="rate()">RATE THIS ACTIVITY</button></div>';
  }
}
  ?>
</div>


<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Hii <?php echo $firstname;?></h4>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
        
<?php echo $demoprint;?>
$(".cat_container").eq(<?php echo $eq;?>).css("background","#2364ae");
$(".cat_container").eq(<?php echo $eq;?>).css("color","white");
$(".cat_container").eq(<?php echo $eq;?>).css("box-shadow","0px 0px 0px #00000082");

$(".image-fix").popImg();

function getFileType(file) {

if(file.type.match('image.*'))
  return 'image';

if(file.type.match('video.*'))
  return 'video';

return 'other';
}
var myform = document.querySelector('#myform');
var inputfile = document.querySelector('#file');
var bar = document.getElementsByClassName("progress-bar")[0];
var progress=document.getElementsByClassName("progress")[0];
var userid="<?php echo $_SESSION["userId"];?>";
var organizationId="<?php echo $_SESSION["organizationId"];?>";
var token = "<?php echo $_SESSION['token']; ?>"
var request = new XMLHttpRequest();

request.upload.addEventListener('progress',function(e){
  bar.style.width=Math.round(e.loaded/e.total * 100)+'%';
  bar.innerHTML=Math.round(e.loaded/e.total * 100)+'% please wait..';

},false);

myform.addEventListener('submit',function(e){
var name=$("#name").val();
var business=$("#business").val();
var location_user=$("#location").val();
var category=$("#category").val();
  console.log(business);
    progress.style.display="block";
	e.preventDefault();
	var formData = new FormData();
    var checkUrl=getFileType(inputfile.files[0]);
    if(checkUrl=="video"){
     //   var appSend="upload-video.php";
     swal("", "Only image allowed", "error");
    }else if(checkUrl=="image"){
  var appSend="upload-image.php";
  formData.append('file',inputfile.files[0]);
	formData.append("name",name);
	formData.append("business",business);
	formData.append("location",location_user);
  formData.append("category",category);
  formData.append("userid",userid);
  formData.append("organizationId",organizationId);
  request.open('post',appSend,true);
	request.onreadystatechange=function(){
		if(request.readyState == 4 && request.status == 200){
      progress.style.display="none";
      var data = JSON.parse(request.responseText);
                    if(data.success){
                           if(data.isdemo){
                                 swal("Subscribe to any PLAN to play with your peers.", "", "success").then(() => {
                                  location.reload();
                              });
                       }else{
                                  updatePostUserid(data.reportId);
                                  swal("Thank you for Participating!", "", "success").then(() => {
                                                    location.reload();
                                              });
                         }
                }else{
                   alert(data);
                    }
		}

	}
	request.send(formData);
    }
    


},false);





$("body").on("click",".vote",function(){
    var post_id=$(this).attr("post_id");
    var status=$(this).attr("status");
    var report_id=$(this).attr("report_id");
    console.log(userid);
    if(isdemo){
      swal("", "Subscribe to any PLAN to access.", "error");
    }else{
      if(status=="true"){
         swal("", "you have already liked this post!", "error");
    }else{
        $.ajax({ 
       type: "POST", 
       url: "likes.php", 
       data: "post_id="+post_id+"&user="+userid+"&organizationId="+organizationId+"&report_id="+report_id, 
       success: function(result){ 
         console.log(result);
           if(result=="blocked"){
                 swal("", "you already liked this post!", "error");
           }else{
                 swal("", "Thank you for liking!", "success");
                 setTimeout(function(){
                  location.reload();
                },1500);    
             }
          } 
       });   
    } 
    }
});

function ratePop() {
        swal("Thank you For Participating!", "", {buttons: {catch: {text: "Rate this game",value: "Yes",},cancel: "Close"},})
            .then((value) => {
                switch (value) {
                    case "no":
                       location.reload();
                        break;

                    case "Yes":
                         rate();
                        break;

                    default:
                    location.reload();
                }
            });
    }

function rate(){
  location.href="../rate-default.php";
}


function updatePostUserid(report_id){
  $.ajax({ 
       type: "POST", 
       url: "likes_update.php", 
       data: "report_id="+report_id, 
       success: function(result){ 
          if(result=="true"){
            console.log("report id updated");
          }
        } 
});
}


            <?php
            if(isset($error_auth)){
                echo  'swal("Invalid OTP", "Please Check Your OTP", "error");';
            }
            ?>
        </script>
<script>

</script>
    </body>
</html>

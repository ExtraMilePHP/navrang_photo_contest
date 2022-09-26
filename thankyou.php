<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>wordpuzzle - Extramile</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/styles.css">
  <link rel="stylesheet" type="text/css" href="css/rating.css">
  <style rel="stylesheet" type="text/css">
  body{
    width:100%;
    background-color: white;
    background-image: url(images/rules-background.png);
    background-repeat: no-repeat;
    background-size: 100% 100%;
}
.rules-text{
  width: 150px;
  margin-top:40px;
  margin-bottom:20px;
}
.container-control{
    margin-top:80px;
}
.next{
    width:130px;
    font-size: 18px;
    background: #269abc;
}

@media (min-width:100px) and (max-width:500px){
    body{
        overflow: scroll;
        background-image: url(images/rules-background-mob.png);
        background-repeat: repeat;
    }
    .desk{
        display: none;
    }
    .mob{
        display: block;
    }
    .container-control{
        margin-top:45px;
    }
    .thankyou{
        width:100% !important;
    }
   }

   .thankyou{
    width: 400px;
    margin: 0 auto;
    padding: 5px;
    font-size: 25px;
    color: white;
    background-image: linear-gradient(to right, #e35a6d , #fa9747);
   }
   .score{
    font-size: 27px;
    margin-top: 15px;
    color: #e35a6d;
   }
  </style>
</head>
<body>
<div class="container-fluid container-control">
<div class="row">
<div class="col-md-12 text-center">
<div class="thankyou">Thank you for participating!</div>
<div class="score">Your score is 1</div>
</div>
<div class="col-md-12 text-center">
<div class="btn btn-info next" style="margin-top:15px; width:200px;">Rate this game</div>
</div>
</div>
</div>

<script type="text/javascript">
var currentRating=5;
var ratingData=["fair","average","good","excellent","awesome"];
$(".rating input:radio").click(function() {
    var radioValue = $("input[name='rating']:checked").val();
            if(radioValue){
                radioValue=parseInt(radioValue);
                $(".rate").html(ratingData[radioValue-1]);
                $(".rate").show();
                $("#review").show();
                $(".submit-button").show();
                currentRating=radioValue;
            }
});
</script>
</body>
</html>

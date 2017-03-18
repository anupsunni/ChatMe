<!DOCTYPE html>
<html>
<head>
	<title>ChatMe</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="bsjs/bootstrap.min.css">
<script src="bsjs/jquery.min.js"></script>
<script src="bsjs/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/index.css">
<!--  -->
<script> 

$(document).ready(function(){

$(".reg").click(function() {
    $('html, body').animate({
        scrollTop: $(".container-fluid").offset().top
    }, 2000);
});
})

$(window).scroll(function() {
  $(".slideanim").each(function(){
    var pos = $(this).offset().top;

    var winTop = $(window).scrollTop();
    if (pos < winTop + 600) {
      $(this).addClass("slide");
    }
  });
});


</script>


</head>


<body>
<!-- LOGIN -->
<div class="jumbotron text-center">
  <h1>ChatMe</h1> 
  <p><br></p> 

<div class="formcenter">
<form method="post" action="login.php">
  <div class="form-group">
    <!-- <label for="email">Email address:</label> -->
    <input type="email" class="form-control customa" id="email" placeholder="Email Address" name="EmAiL">
  </div>
  <div class="form-group">
    <!-- <label for="pwd">Password:</label> -->
    <div ><input type="password" class="form-control customa" id="pwd" placeholder="Password" name="PaSs"></div>
  </div>
  
  <button type="submit" class="btn custom">Login</button>
</form>
</div>

</div>


<div class="container-fluid">
 
<div class="col-sm-8">
 
<!-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->



 <h1>SignUp</h1>
 <form action="php/register.php" method="post">
  <div class="form-group">
    
    <input type="name" class="form-control customa" id="name" placeholder="Your Name" name="reg_name">
  </div><div class="form-group">
    <!-- <label for="email">Email address:</label> -->
    <input type="email" class="form-control customa" id="email" placeholder="Email Address" name="reg_email">
  </div>
  <div class="form-group">
    <!-- <label for="pwd">Password:</label> -->
    <div ><input type="password" class="form-control customa" id="pwd" placeholder="Password" name="reg_pass"></div>

</div>



  
  <button type="submit" class="btn btn-info" id="Registration">Join</button>
  
  </div>
  <div class="col-sm-4"> <span class="glyphicon glyphicon-envelope enveIcon slideanim"></span></div>
</form>
</div>

<button style="text-decoration:none"  class="reg"><strong>SIGNUP</strong></button>






</body>
</html>
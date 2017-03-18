<?php  
session_start();
echo '<!DOCTYPE html>
<html>
<head>
  <title>';
  echo $_SESSION["name_store"]."'s page";
  echo '</title>
<link rel="stylesheet" href="bsjs/bootstrap.min.css">
<script src="bsjs/jquery.min.js"></script>
<script src="bsjs/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/search.css" type="text/css">
<link rel="stylesheet" type="text/css" href="css/wall.css">
<link rel="stylesheet" href="css/search.css" type="text/css">
<script src="js/nsc.js"></script>



</head>
<body>



<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" >';
  echo $_SESSION["name_store"];
  echo '</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li id="Not" ><a href="#S">Notifications</a><div class="ntdv""></div></li>
        <li><a href="#S" id="s">Search</a></li>
        <li><a href="friends.php" id="f">Friends</a></li>
        <li><a href="groups.php" id="g">Groups</a></li>
        <li><a href="php/logout.php">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
<div id="unclick">










<!-- Search -->
<div class="container-fluid Search" id="S">
  <h2 id="hdrs">Search</h2>
 <form class="form-inline">
    <input type="text" class="form-control" size="50" placeholder="Search Name" id="srch">
   <div id="search_results"><h4>Find Friends</h4></div>
 </form>


</div>
<!-- Search -->






<div class="footer"></div>
<script type="text/javascript" src="js/search.js"></script>
</div>
</body>
</html>';
?>
<script src="bsjs/jquery.min.js"></script>
<script src="js/notification.js"></script>
<script src="js/conreq.js"></script>
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
  <link rel="stylesheet" href="css/search.css" type="text/css"><script src="js/nsc.js"></script>
  <link rel="stylesheet" type="text/css" href="css/wall.css">
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
          <li><a href="wall.php#S" id="s">Search</a></li>
          <li><a href="friends.php" id="f">Friends</a></li>
          <li><a href="groups.php" id="g">Groups</a></li>
          <li><a href="php/logout.php">Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <div id="unclick">


<!-- Friends -->
<div class="container-fluid Friends" id="F">
  
  <div class="InsideFriends2">
  ';
require 'php/friendhelper2.php';
  echo '
  </div>
  <div class="InsideFriends">
  <h4>Requests</h4>
  ';
  require 'php/friends2.php';
  echo '
  </div>
</div>
<!-- Friends -->














  <div class="footer"></div></div>
  </body>
  </html>';  ?>
<script src="js/notification.js"></script>
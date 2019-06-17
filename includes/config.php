<?php

  ob_start(); //send data to server in pieces

  $timezone = date_default_timezone_set("Africa/Luanda"); //my server timezone

  $con = mysqli_connect("localhost","root","","jdmusic"); //database credentials

  if(mysqli_connect_errno()){
    echo "Failed to connect: " . mysqli_connect_errno();
  }

?>

<?php

  ob_start(); //send data to server in pieces

  session_start(); //initiate method to keep track of users through pages in website

  session_destroy(); //destroy the session
  
  $timezone = date_default_timezone_set("Europe/Lisbon"); //my server timezone

  $con = mysqli_connect("localhost","root","","jdmusic"); //database credentials

  //In case of connection error to database
  if(mysqli_connect_errno()){
    echo "Failed to connect: " . mysqli_connect_errno();
  }

?>

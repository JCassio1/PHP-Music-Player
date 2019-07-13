<?php
require("includes/config.php"); //include in order to start session
require("includes/classes/Artist.php");
require("includes/classes/Album.php");
require("includes/classes/Song.php");


//session_destro(); //method to logout manually (temporary solution [Will cause issues at login if uncommented])


if (isset($_SESSION['userLoggedIn'])){
  $userLoggedIn = $_SESSION['userLoggedIn'];
}
//If session does not start then user cannot access this page
else{
  header("Location: register.php");
}
?>

  <html lang="en" dir="ltr">
    <head>
      <meta charset="utf-8">
      <title>JDMusic</title>
      <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
      <div id="mainContainer">

        <div id="topContainer">

          <?php include 'includes/navBarContainer.php'; ?>

          <div id="mainViewContainer">

            <div id="mainContent">

<?php

require("includes/config.php"); //include in order to start session

//session_destro(); //method to logout manually (temporary solution)

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
    </head>
    <body>
      Hello
    </body>
  </html>

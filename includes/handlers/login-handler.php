<?php

  //When login button is pressed
  if(isset($_POST['loginButton'])){

    //echo "Login button was pressed!"; //This is for testing

    //Gets data from register page
    $username = $_POST['loginUsername'];
    $password = $_POST['loginPassword'];

    $result = $account->login($username,$password);

    if ($result == true){
      $_SESSION['userLoggedIn'] = $username;
      header("Location: index.php");
    }
  }
?>

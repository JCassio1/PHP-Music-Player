<?php

function sanitizeFormUsername($inputText){
  $inputText = strip_tags($inputText); //strip removes all html elements it might contain (html injection)
  $inputText = str_replace(" ","", $inputText); //remove whitespace
  return $inputText;
}

function sanitizeFormString($inputText){
  $inputText = strip_tags($inputText);
  $inputText = str_replace(" ","", $inputText);
  $firstName = ucfirst(strtolower($inputText)); //Uppercase the first character
  return $inputText;
}

function sanitizeFormPassword($inputText){
  $inputText = strip_tags($inputText);
  return $inputText;
}

if(isset($_POST['loginButton'])){
  //When login button is pressed
  echo "Login button was pressed!";

}

if(isset($_POST['registerButton'])){
  //When register button is pressed
  echo "register button was pressed!";

  $username = sanitizeFormUsername($_POST['registerUsername']);

  $firstName = sanitizeFormString($_POST['firstName']);

  $lastName = sanitizeFormString($_POST['lastName']);

  $email = sanitizeFormString($_POST['email']);

  $email2 = sanitizeFormString($_POST['email2']);

  $password = sanitizeFormPassword($_POST['password']);

  $password2 = sanitizeFormPassword($_POST['password2']);
}


?>


<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <!-- Login form script -->

    <div id="inputContainer">
      <form id="loginForm" action="register.php" method="POST">
        <h2>Inicie a sua sessão</h2>
        <p>
            <label for="loginUsername"> Username </label>
              <input id="loginUsername" name="loginUsername" type="text" placeholder="e.g. RickyMorty" required>
        </p>
        <p>
          <label for="loginPassword"> Password </label>
          <input id="loginPassword" name="loginPassword" type="password" required>
        </p>

        <button type="submit" name="loginButton">Login</button>
    </form>


  <!-- Registration form script -->

    <form id="registerForm" action="register.php" method="POST">
      <h2>Crie a sua conta gratuita</h2>
      <p>
        <label for="Username"> Username </label>
        <input id="registerUsername" name="registerUsername" type="text" placeholder="e.g. RickyMorty" required>
      </p>

      <p>
        <label for="firstName"> First Name </label>
        <input id="firstName" name="firstName" type="text" placeholder="e.g. Ricky" required>
      </p>

      <p>
        <label for="lastName"> Last Name </label>
        <input id="lastName" name="lastName" type="text" placeholder="e.g. Morty" required>
      </p>

      <p>
        <label for="email"> Email </label>
        <input id="email" name="email" type="email" placeholder="e.g. RickyMorty@gmail.com" required>
      </p>

      <p>
        <label for="email2"> Confirm Email </label>
        <input id="email2" name="email2" type="email" placeholder="e.g. RickyMorty@gmail.com" required>
      </p>

      <p>
        <label for="password"> Password </label>
        <input id="password" name="password" type="password" placeholder="password" required>
      </p>

      <p>
        <label for="password2"> Confirm Password </label>
        <input id="password2" name="password2" type="password" placeholder=" Confirm password" required>
      </p>

      <button type="submit" name="registerButton">Registrar</button>
    </form>

    </div>
  </body>
</html>

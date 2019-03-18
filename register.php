<?php
  require("includes/classes/Account.php");

  $account = new Account();

  require("includes/handlers/register-handler.php");
  require("includes/handlers/login-handler.php");
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
        <?php echo $account->getError("Sorry! Username must be between 5 and 25 characters"); ?>
        <label for="Username"> Username </label>
        <input id="registerUsername" name="registerUsername" type="text" placeholder="e.g. RickyMorty" required>
      </p>

      <p>
        <?php echo $account->getError("Sorry! first name must be between 5 and 25 characters"); ?>
        <label for="firstName"> First Name </label>
        <input id="firstName" name="firstName" type="text" placeholder="e.g. Ricky" required>
      </p>

      <p>
        <?php echo $account->getError("Sorry! last name must be between 5 and 25 characters"); ?>
        <label for="lastName"> Last Name </label>
        <input id="lastName" name="lastName" type="text" placeholder="e.g. Morty" required>
      </p>

      <p>
        <?php echo $account->getError("Your emails do not match"); ?>
        <?php echo $account->getError("Email is not valid"); ?>
        <label for="email"> Email </label>
        <input id="email" name="email" type="email" placeholder="e.g. RickyMorty@gmail.com" required>
      </p>

      <p>
        <?php echo $account->getError("Your emails do not match"); ?>
        <?php echo $account->getError("Email is not valid"); ?>
        <label for="email2"> Confirm Email </label>
        <input id="email2" name="email2" type="email" placeholder="e.g. RickyMorty@gmail.com" required>
      </p>

      <p>
      <?php echo $account->getError("Your passwords do not match"); ?>
      <?php echo $account->getError("Your password can only contain numbers and letters"); ?>
        <?php echo $account->getError("Apologies! Passwords must be between 5 and 25 characters"); ?>
        <label for="password"> Password </label>
        <input id="password" name="password" type="password" placeholder="password" required>
      </p>

      <p>
      <?php echo $account->getError("Your passwords do not match"); ?>
      <?php echo $account->getError("Your password can only contain numbers and letters"); ?>
        <?php echo $account->getError("Apologies! Passwords must be between 5 and 25 characters"); ?>
        <?php echo $account->getError("Sorry! Username must be between 5 and 25 characters"); ?>
        <label for="password2"> Confirm Password </label>
        <input id="password2" name="password2" type="password" placeholder=" Confirm password" required>
      </p>

      <button type="submit" name="registerButton">Registrar</button>
    </form>

    </div>
  </body>
</html>

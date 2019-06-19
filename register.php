<?php
  require("includes/config.php");
  require("includes/classes/Account.php");
  require("includes/classes/Constants.php");

  // Login form code to initialise code
  $account = new Account($con);

  require("includes/handlers/register-handler.php");
  require("includes/handlers/login-handler.php");

  function getInputValue($name){
    if(isset($_POST[$name])){
      echo $_POST[$name];
    }
  }
?>


<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Welcome to JD Music</title>
    <link rel="stylesheet" href="assets/css/register.css">
  </head>
  <body>

    <div id="background">

        <!-- Login form script -->

        <div id="inputContainer">
          <form id="loginForm" action="register.php" method="POST">
            <h2>Inicie a sua sessão</h2>
            <p>
                <?php echo $account->getError(Constants::$loginFailed); ?>
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
          <h2>Create your free account</h2>
          <p>
            <?php echo $account->getError(Constants::$usernameCharacters); ?>
            <?php echo $account->getError(Constants::$usernameTaken); ?>
            <label for="Username"> Username </label>
            <input id="registerUsername" name="registerUsername" type="text" placeholder="e.g. RickyMorty" value="<?php getInputValue('registerUsername') ?>" required>
          </p>

          <p>
            <?php echo $account->getError(Constants::$firstNameCharacters); ?>
            <label for="firstName"> First Name </label>
            <input id="firstName" name="firstName" type="text" placeholder="e.g. Ricky" value="<?php getInputValue('firstName') ?>" required>
          </p>

          <p>
            <?php echo $account->getError(Constants::$lastNameCharacters); ?>
            <label for="lastName"> Last Name </label>
            <input id="lastName" name="lastName" type="text" placeholder="e.g. Morty" value="<?php getInputValue('lastName') ?>" required>
          </p>

          <p>
            <?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
            <?php echo $account->getError(Constants::$emailNotValid); ?>
            <?php echo $account->getError(Constants::$emailTaken); ?>
            <label for="email"> Email </label>
            <input id="email" name="email" type="email" placeholder="e.g. RickyMorty@gmail.com" value="<?php getInputValue('email') ?>" required>
          </p>

          <p>
            <label for="email2"> Confirm Email </label>
            <input id="email2" name="email2" type="email" placeholder="e.g. RickyMorty@gmail.com" value="<?php getInputValue('email2') ?>" required>
          </p>

          <p>
            <?php echo $account->getError(Constants::$passwordsDoNotMatch); ?>
            <?php echo $account->getError(Constants::$passwordsDoNotAlphanumeric); ?>
            <?php echo $account->getError(Constants::$passwordsCharacters); ?>
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
    </div> <!-- background div close -->
  </body>
</html>

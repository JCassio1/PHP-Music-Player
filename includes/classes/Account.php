<?php

class Account{

  private $con;
  private $errorArray;

  //This is the first function that gets called in this class (constructor)
  public function __construct($con){
    $this->con = $con;
    $this->errorArray = array();
  }


  public function login($registerUsername, $password){

    $password = md5($password);

    $loginQuery = mysqli_query($this->con, "SELECT * FROM users WHERE username = '$registerUsername' AND password = '$password'");

    if (mysqli_num_rows($loginQuery) == 1){
      return true;
    }

    else{
      array_push($this->errorArray, Constants::$loginFailed);
      return false;
    }
  }


    public function register($registerUsername, $firstName, $lastName, $email, $email2, $password, $password2){
      $this->validateUsername($registerUsername);
      $this->validateFirstName($firstName);
      $this->validateLastName($lastName);
      $this->validateEmails($email, $email2);
      $this->validatePasswords($password, $password2);

      //if this error list is empty then no error generated
      if(empty($this->errorArray) == true){

          //Insert to db || Remember to add "$this" to mention instance of class
          return $this->insertUserDetails($registerUsername,$firstName, $lastName, $email, $password);
      }

      else{
        return false;
      }
  }

  public function getError($error){
    if(!in_array($error, $this->errorArray)){
      $error = "";
    }

    echo "<span class='errorMessage'>$error</span>";
  }

  private function insertUserDetails($registerUsername,$firstName, $lastName, $email, $password){
    $encryptedPassword = md5($password); //encrypts password using md5 encryption (Not the best but yea)
    $profilePicture = "assets/images/ProfilePictures/rick.png";
    $date = date(Y-m-d);

    //Adding new user to database
    $result = mysqli_query($this->con,"INSERT INTO users VALUES ('','$registerUsername','$firstName', '$lastName', '$email', '$encryptedPassword', '$date','$profilePicture')");

    return $result;
  }

  private function validateUsername($registerUsername){

    if (strlen($registerUsername) > 25 || strlen($registerUsername) < 5){
      array_push($this->errorArray, Constants::$usernameCharacters);


      return;
    }

      // TODO: Check if Username already exists in database

      $checkUsernameQuery = mysqli_query($this->con, "SELECT username FROM users WHERE username ='$registerUsername'");

      //Check if rows return zero
      if (mysqli_num_rows($checkUsernameQuery) != 0){
          array_push($this->errorArray, constants::$usernameTaken);
      }

  }

  private function validateFirstName($firstName){

    if (strlen($firstName) > 25 || strlen($firstName) < 2){
      array_push($this->errorArray, Constants::$firstNameCharacters);
      return;
    }

  }

  private function validateLastName($lastName){

    if (strlen($lastName) > 25 || strlen($lastName) < 2){
      array_push($this->errorArray, Constants::$lastNameCharacters);
      return;
    }

  }

  private function validateEmails($email, $email2){

    if($email != $email2){
      array_push($this->errorArray, Constants::$emailsDoNotMatch);
      return;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      array_push($this->errorArray, Constants::$emailNotValid);
      return;
    }

    //// TODO: verify if email doesn't already exist
    $checkEmailQuery = mysqli_query($this->con, "SELECT email FROM users WHERE email ='$email'");
    if (mysqli_num_rows($checkEmailQuery) != 0){
        array_push($this->errorArray, constants::$emailTaken);
    }

  }

  private function validatePasswords($password, $password2){

    if($password != $password2){
      array_push($this->errorArray, Constants::$passwordsDoNotMatch);
      return;
    }

    if(preg_match('/[^A-Za-z0-9]/', $password)){
      array_push($this->errorArray, Constants::$passwordsDoNotAlphanumeric);
    }

    if (strlen($password) > 25 || strlen($password) < 2){
      array_push($this->errorArray, Constants::$passwordsCharacters);
      return;
    }

  }

}

?>

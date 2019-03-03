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

function validateUsername($un){

}

function validateFirstName($fn){

}

function validateLastName($ln){

}

function validateEmails($ue1, $ue2){

}

function validatePasswords($pw1, $pw2){

}

  if(isset($_POST['registerButton'])){
    //When register button is pressed
    $username = sanitizeFormUsername($_POST['registerUsername']);
    $firstName = sanitizeFormString($_POST['firstName']);
    $lastName = sanitizeFormString($_POST['lastName']);
    $email = sanitizeFormString($_POST['email']);
    $email2 = sanitizeFormString($_POST['email2']);
    $password = sanitizeFormPassword($_POST['password']);
    $password2 = sanitizeFormPassword($_POST['password2']);
}
?>

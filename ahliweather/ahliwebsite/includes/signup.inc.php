<?php
if (isset($_POST['signup-submit'])) {

  require 'dbc.inc.php';
  require 'user.inc.php';

  $username = $_POST["uid"];
  $mail = $_POST["mail"];
  $firstName = $_POST['first'];
  $lastName = $_POST['last'];
  $pwd = $_POST["pwd"];
  $pwdRepeat = $_POST["pwd-repeat"];
  $rankUser= $_POST["rankUser"];

  if (empty($username) || empty($mail) || empty($firstName)|| empty($lastName) || empty($pwd) || empty($pwdRepeat)||empty($rankUser)) {
    header("Location: ../signup.php?error=emptyfields&user=".$username."&email=".$mail);
    exit();
  }
  else if (!filter_var($mail, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
    header("Location: ../signup.php?error=invalidmailuser");
    exit();
  }
  else if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../signup.php?error=invalidmail&user=".$username);
    exit();
  }
  else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
    header("Location: ../signup.php?error=invaliduser&email=".$mail);
    exit();
  }/*
  else if(!preg_match("/^[a-zA-Z*$/",$firstName)){
   header("Location: ../signup.php?error=firstnameerror".$firstName);
  }
  else if(!preg_match("/^[a-zA-Z*$/",$lastName)){
      header("Location: ../signup.php?error=lastnameerror".$lastName);
  }*/
  else if ($pwd !== $pwdRepeat) {
    header("Location: ../signup.php?error=passworderror&user=".$username."&email=".$mail);
    exit();
  }
  else if (empty($rankUser)){
      header("Location: ../signup.php?error=rankerror=".$rankUser);
      exit();
  }
  else {
    $object = new User;
    if ($object->getUserNameExists($username)) {
      header("Location: ../signup.php?error=usernameexists&email=".$mail);
      exit();
    }
    else if ($object->getMailExists($mail)) {
      header("Location: ../signup.php?error=mailexists&user=".$username);
      exit();
    }
    else {
      $object->insertNewUser($username, $mail, $firstName, $lastName, $pwd, $rankUser);
      header("Location: ../signup.php?signup=success");
    }
  }

} else {
  echo "Not accesable through this link";
}

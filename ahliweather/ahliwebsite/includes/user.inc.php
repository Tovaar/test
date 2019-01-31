<?php

class User extends Dbc {

  public function getUserNameExists($username) {
    $usernameprepared = $username;

    $stmt = $this->connect()->prepare("SELECT usernameUsers FROM users where usernameUsers=?");
    $stmt->execute([$username]);

    if ($stmt->rowCount()) {
      while ($row >= 0) {
        return true;
      }
    }
    else {
      return false;
    }
  }



  public function getMailExists($mail) {
    $mailprepared = $mail;

    $stmt = $this->connect()->prepare("SELECT emailUsers FROM users where emailUsers=?");
    $stmt->execute([$mail]);

    if ($stmt->rowCount()) {
      while ($row >= 0) {
        return true;
      }
    }
    else {
      return false;
    }
  }

  public function insertNewUser($username, $mail,$firstName, $lastName, $pwd,$rankUser) {
    $usernameprepared = $username;
    $mailprepared = $mail;
    $firstNamePrepared = $firstName;
    $lastNamePrepared = $lastName;
    $hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);

    $stmt = $this->connect()->prepare("INSERT INTO users (usernameUsers,emailUsers, firstNameUsers, lastNameUsers,  passwordUsers,rankUsers) VALUES (?, ?, ?, ?, ?,?)");
    $stmt->execute([$username,$mail,$firstName, $lastName,$hashedpwd,$rankUser]);
  }

  public function loginUser($usernameEmail,$password) {
    try {
      $stmt = $this->connect()->prepare("SELECT * FROM users WHERE usernameUsers=? OR emailUsers=?");
      $stmt->execute([$usernameEmail,$usernameEmail]);
      $count=$stmt->rowCount();
      $data=$stmt->fetch(PDO::FETCH_OBJ);
      if (is_object($data)) {
        if(password_verify($password,$data->passwordUsers)) {
          session_start();
          $_SESSION['userid'] = $data->idUsers;
          $_SESSION['username'] = $data->usernameUsers;
          $_SESSION['rankUser'] = $data->rankUsers;
          header("Location: ../index.php?login=succes");
          exit();
        }
        else {
          header("Location: ../index.php?error=invalidpassword");
          exit();
        }
      } else {
        header("Location: ../index.php?error=invaliduser");
        exit();
      }
    }
      catch(PDOException $e) {
      echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
  }

  public function updateUser($username, $mail, $firstName, $lastName, $pwd, $rankUser){
      $usernameprepared = $username;
      $mailprepared = $mail;
      $firstNamePrepared = $firstName;
      $lastNamePrepared = $lastName;
      $hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);

    $stmt =$this->connect()->prepare("UPDATE users SET usernameUsers =$username, emailUsers =$mail, firstNameUsers = $firstName, lastNameUsers = $lastName, passwordUsers =$pwd, rankUsers = $rankUser");
    #$stmt->execute($username, $mail, $firstName, $lastName, $pwd, $rankUser);
  }

  public function updateUsername($username, $id){
      $usernameprepared = $username;
      $idprepared = $id;
      $stmt = $this->connect()->prepare("UPDATE users SET usernameUsers = :username WHERE idUers = :id");
      $stmt->execute(array(':location' =>$username, 'id' => $id));
  }
    public function updateEmail($mail){
        $mailprepared = $mail;
        $stmt = $this->connect()->prepare("UPDATE users SET emailUsers = '$mail'");
        $stmt->execute([$mail]);
    }
}
?>

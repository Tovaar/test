<?php
/**
 * Created by PhpStorm.
 * User: Sander
 * Date: 30-1-2019
 * Time: 14:20
 */

if (isset ($_POST['change-submit'])){
    require 'dbc.inc.php';
    require 'user.inc.php';
    require "table.inc.php";


    $id = $_POST['id'];
    $username = $_POST["uid"];
    $mail = $_POST["mail"];
    $firstName = $_POST['first'];
    $lastName = $_POST['last'];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwd-repeat"];
    $rankUser= $_POST["rankUser"];



    $fetch = new inc();
    $returndata = $fetch->getUser($id);

    foreach ($returndata as $data) {

/*
        } if (!filter_var($mail, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
            header("Location: ../delete_users.php?error=invalidmailuser");
            exit();
        } else if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            header("Location: ../delete_users.php?error=invalidmail&user=" . $username);
            exit();
        } else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
            header("Location: ../delete_users.php?error=invaliduser&email=" . $mail);
            exit();
        }else if ($pwd !== $pwdRepeat) {
                header("Location: ../signup.php?error=passworderror&user=".$username."&email=".$mail);
                exit();
        } else if (empty($rankUser)) {
            header("Location: ../delete_users.php?error=rankerror=" . $rankUser);
            exit();
        } else {*/
            $object = new User;
            if ($object->getUserNameExists($username)) {
                header("Location: ../delete_users.php?error=usernameexists&email=" . $mail);
                exit();
            } else if ($object->getMailExists($mail)) {
                header("Location: ../delete_users.php?error=mailexists&user=" . $username);
                exit();
            } else if(!empty($username)) {
                $object->updateUsername($username, $id);
                header("Location: ../delete_users.php?change=success");
                exit();
            }elseif (!empty($mail)) {
                $object->updateEmail($mail);
                header("Location: ../delete_users.php?change=success");
                exit();
            }

/*
    if (!empty($username)) {
        $obj->updateUsername($username, $id);
    } elseif (!empty($mail)) {
        $obj->updateEmail($mail);
    } elseif (empty($firstName)) {
        $firstName = $data['firstNameUsers'];
    } elseif (empty($lastName)) {
        $lastName = $data['lastNameUsers'];
    } elseif (empty($pwd)) {
        $pwd = $data['passwordUsers'];
    } elseif (empty($pwdRepeat)) {
        $pwdRepeat = $data['passwordUsers'];
    } elseif (empty($rankUser)) {
        $rankUser = $data['rankUsers'];
    }*/
 else {
    echo "Not accesable through this link";
 }}}


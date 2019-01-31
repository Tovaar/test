<?php
/**
 * Created by PhpStorm.
 * User: Sander
 * Date: 29-1-2019
 * Time: 19:48
 */
require "header.php";

if (isset($_SESSION['rankUser']) && ($_SESSION['rankUser'] == 2)) {
    require "includes/dbc.inc.php";
    require "includes/user.inc.php";

    require "includes/table.inc.php";

$id = $_GET['idUsers'];
$fetch = new inc();
$returndata = $fetch->getUser($id);



    ?>
<main>
    <div class="container" style="padding-top:50px">
        <div class="row">
            <div class="col-sm">
                <h1 style="text-align: center;">User Info</h1>
                <div style="padding-top:50px;"></div>
                <?php
                if (isset($_GET['error'])) {
                    if ($_GET['error'] == "emptyfields") {
                        ?>
                        <div class="alert alert-danger" role="alert">
                            Fill in all fields before submitting.
                        </div>
                        <?php
                    } elseif ($_GET['error'] == "invalidmailuser") {
                        ?>
                        <div class="alert alert-danger" role="alert">
                            Invalid Username & E-mail address.
                        </div>
                        <?php
                    } elseif ($_GET['error'] == "invalidmail") {
                        ?>
                        <div class="alert alert-danger" role="alert">
                            Invalid E-mail address.
                        </div>
                        <?php
                    } elseif ($_GET['error'] == "invaliduser") {
                        ?>
                        <div class="alert alert-danger" role="alert">
                            Invalid Username.
                        </div>
                        <?php
                    } elseif ($_GET['error'] == "usernameexists") {
                        ?>
                        <div class="alert alert-danger" role="alert">
                            Username already in use.
                        </div>
                        <?php
                    } elseif ($_GET['error'] == "passworderror") {
                        ?>
                        <div class="alert alert-danger" role="alert">
                            Passwords did not match.
                        </div>
                        <?php
                    } elseif ($_GET['error'] == "rankerror") {
                        ?>
                        <div class="alert-danger" role="alert">
                            Select role.
                        </div>
                        <?php
                    }
                } elseif (isset($_GET['change'])) {
                    if ($_GET['change'] == "success") {
                        ?>
                        <div class="alert alert-success" role="alert">
                            The change was successful!
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="alert alert-danger" role="alert">
                            The change was a failure!
                        </div>
                        <?php
                    }
                }
                ?>
                <?php foreach ($returndata as $data) {

        ?>
        <form class="form-group" action="includes/change.inc.php" method="post">
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-passport"></i></span>
                </div>
                <input type="text"  class="form-control mr-sm-2" name="id" placeholder="<?php echo $data['idUsers'] ?> "readonly="readonly"
                       aria-label="username" aria-describedby="username">
            </div>
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" class="form-control mr-sm-2" name="uid" placeholder="<?php echo $data ['usernameUsers']?>"
                       aria-label="username" aria-describedby="username">
            </div>
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i
                                        class="fas fa-envelope fa-sm"></i></span>
                </div>
                <input type="text" class="form-control mr-sm-2" name="mail" placeholder="<?php echo $data['emailUsers'] ?>"
                       aria-label="mail" aria-describedby="mail">
            </div>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" class="form-control mr-sm-2" name="first" placeholder="<?php echo $data['firstNameUsers'] ?>"
                           aria-label="first name" aria-describedby="first name">
                </div>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control mr-sm-2" name="last" placeholder="<?php echo $data['lastNameUsers'] ?>"
                               aria-label="last name" aria-describedby="last name">
                    </div>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                        </div>
                        <input type="password" class="form-control mr-sm-2" name="pwd" placeholder="Password"
                               aria-label="password" aria-describedby="pwd">
                    </div>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                        </div>
                        <input type="password" class="form-control mr-sm-2" name="pwd-repeat"
                               placeholder="Repeat password" aria-label="password-repeat"
                               aria-describedby="pwd-repeat">
                    </div>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i
                                        class="fas fa-certificate fa-sm"></i></span>
                        </div>

                        <select name="rankUser" class="form-control mr-sm-2" aria-label="rankUser">
                            <option value="1">User</option>
                            <option value="2">Admin</option>
                        </select>
                    </div>
                    <div class="col-md-12 text-center">
                        <button class="btn btn-dark" type="submit" name="change-submit">Change</button>
                        <button class="btn btn-danger" type="submit" name="delete">Delete</button>

                    </div>
                </form>
        </div>
        </div>
        </div>
        </main><?php
    }
}else{
    echo "You're not allow to get here this way";
}
<?php require "header.php" ?>

<?php
// variables

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $error = $firstname = $lastname  = $email = $phone = $subject = $message = "";

// do functions on variables
    $firstname = $_POST["firstName"];
    $lastname = $_POST["lastName"];
    //$company = $_POST["company"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    if (empty($firstname) || empty($lastname) || empty($email) || empty($phone) || empty($subject) || empty($message)) {
        $error = "empty";
    }
    else if (!preg_match("/^[a-zA-Z]*$/", $firstname) || !preg_match("/^[a-zA-Z]*$/", $lastname)) {
        $error = "invalidname";
    }
    else if (!preg_match("/^[0-9]*$/", $phone)) {
        $error = "invalidphone";
    }
    else if (!preg_match("/^[a-zA-Z]*$/", $subject)) {
        $error = "invalidsubject";
    }
    else if (!preg_match("/^[a-zA-Z]*$/", $message)) {
        $error = "invalidmessage";
    } else {
        $msg = $message.$firstname.$lastname.$email.$phone;
        $msg = wordwrap($msg, 70);
        mail("d.latumalea@hotmail.com", $subject, $msg);
    }


// functions
}
?>


<main>
    <div class="container" style="padding:50px; ">
        <div class="row">
            <div class="col-sm">
                <h1 style="text-align:center;">Contact Us!</h1>
                <div style="padding-top:50px"></div>
                <?php
                if (isset($error)) {
                    if ($error == "empty") {
                        ?>
                        <div class="alert alert-danger" role="alert">
                          Fill in all fields before submitting.
                        </div>
                        <?php
                    } else if ($error == "invalidmail") {
                        ?>
                        <div class="alert alert-danger" role="alert">
                          Invalid email.
                        </div>
                        <?php
                    } else if ($error == "invalidphone") {
                        ?>
                        <div class="alert alert-danger" role="alert">
                          Invalid phone number.
                        </div>
                        <?php
                    } else if ($error == "invalidsubject") {
                        ?>
                        <div class="alert alert-danger" role="alert">
                          Invalid characters.
                        </div>
                        <?php
                    } else if ($error == "invalidmessage") {
                        ?>
                        <div class="alert alert-danger" role="alert">
                          Invalid characters.
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="alert alert-success" role="alert">
                            Message sent!
                        </div>
                        <?php
                    }
                }

                ?>
                <form class="form-group" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-user fa-fw"></i></span>
                        </div>
                        <input type="text" class="form-control mr-sm-2" name="firstName" placeholder="First name" aria-label="firstName" aria-describedby="firstName">
                    </div>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon2"><i class="fas fa-user fa-fw"></i></span>
                        </div>
                        <input type="text" class="form-control mr-sm-2" name="lastName" placeholder="Last name" aria-label="lastName" aria-describedby="lastName">
                    </div>
                    <!--
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3"><i class="fas fa-building fa-fw"></i></span>
                        </div>
                        <input type="text" class="form-control mr-sm-2" name="company" placeholder="Company name" aria-label="company" aria-describedby="company">
                    </div>
                -->
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3"><i class="fas fa-envelope fa-fw"></i></span>
                        </div>
                        <input type="email" class="form-control mr-sm-2" name="email" placeholder="Email address" aria-label="email" aria-describedby="email">
                    </div>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3"><i class="fas fa-phone fa-fw"></i></span>
                        </div>
                        <input type="tel" class="form-control mr-sm-2" name="phone" placeholder="Phone number" aria-label="phone" aria-describedby="phone">
                    </div>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3"><i class="fas fa-lightbulb fa-fw"></i></span>
                        </div>
                        <input type="text" class="form-control mr-sm-2" name="subject" placeholder="Subject" aria-label="subject" aria-describedby="subject">
                    </div>
                    <div class="input-group mb-2">
                        <textarea class="form-control mr-sm-2" name="message" placeholder="Enter message" style="height:100px"></textarea>
                    </div>
                    <div class="col-md-12 text-center">
                        <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<?php require "footer.php" ?>

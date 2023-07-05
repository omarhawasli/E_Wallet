<?php
// include 'connection.php';

session_start();

$confirm_password_err = "";
$error_war = "";

if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password2'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $error = false;

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);


    // check ob email schon vorhanden ist?

    $sql = "SELECT * FROM user WHERE email='$email';";

    try {

        $dbname = "wallet";
        $serverName = "localhost";
        $user = "root";
        $passwordDB = "";


        $dbh = new PDO(
            "mysql:dbname=$dbname; host=$serverName",
            $user,
            $passwordDB
        );

        // echo "Verbindung erfolgreich hergestellt! <br>";

        $rueckgabe = $dbh->query($sql);
        $erg = $rueckgabe->fetchAll(PDO::FETCH_ASSOC);

        // var_dump(count($erg));
        // die();

        if (count($erg) >= 1) {
            $error_war = "Email is already Registered";
        }
        $dbh = null;
    } catch (PDOException $e) {

        echo "<br>" . $e->getMessage();
    };


    if (empty($error_war)) {

        if ((!password_verify($password2, $hashedPassword))) {
            $confirm_password_err = "Password dosen't Match";
        } else if (empty($email) && empty($password)) {
            $confirm_password_err = 'Please enter Email and Password';
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $confirm_password_err = 'Please enter a valid email address';
        } else if (empty($password)) {
            $confirm_password_err = 'Please provide a Password';
        } else {
            header('location:../users/user_login.php');
        }

        // Insert neue user


        if (empty($confirm_password_err)) {

            $sql = "INSERT INTO user(email, password) Values('$email','$hashedPassword');";

            //hashed passwort

            try {

                $dbname = 'wallet';
                $servername = 'localhost';
                $user = 'root';
                $passwordDB = '';

                $db = new PDO(
                    "mysql:dbname=$dbname; host=$servername",
                    $user,
                    $passwordDB
                );

                $db->query($sql);
                $dbh = NULL;
            } catch (PDOException $e) {

                echo "<br>" . $e->getMessage();
            }
        }
    }
} else {
    $_POST['username'] = NULL;
    $_POST['password'] = NULL;
}

?>


<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include '../helpers/bootstrap.php'; ?>
    <?php include '../helpers/darkmodes.php'; ?>


    <!-- <style>
        @import url('https://fonts.googleapis.com/css2?family=Ubuntu+Mono:ital@1&display=swap');

        body {
            font-family: Ubuntu Mono, monospace;
        } -->
    </style>




</head>

<body>
    <section>
        <div class="p-3 d-flex justify-content-center mt-5 h-50">

            <div>
                <div class="h1 container py-5 d-flex justify-content-center text-primary">Make IT Easy</div>
                <div class="h3">Register</div>

                <form action="" method="POST">
                    <p><label class="" for="username">Enter Your Email Address</label></p>
                    <p><input class="form-control " type="text" type="email" name="email"></p>

                    <p><label for="username">Enter New password</label></p>
                    <p><input class="form-control" type="password" type="text" name="password"></p>

                    <p><label for="username">Re-Enter New password</label></p>
                    <p><input class="form-control" type="password" type="texpasswordt" name="password2"></p>
                    <?php if (!empty($confirm_password_err)) {
                        echo '<div class="alert alert-danger" role="alert"> ' .  $confirm_password_err . '</div>';
                    } ?>
                    <?php if (!empty($error_war)) {
                        echo '<div class="alert alert-danger" role="alert"> ' .  $error_war . '</div>';
                    } ?>
                    <p><input class="btn btn-outline-secondary" type="submit"></p>
                </form>
                <p>Have an account? <a class="text-decoration-none" href="user_login.php">Sign In</a></p>
            </div>

        </div>
    </section>

</body>

</html>
<?php
session_start();

$confirm_password_err = "";
$error_war = "";

if (isset($_POST['login'])) {

    $secretKey = "6LeCwP0mAAAAAAQqOJM58pJVLs_2Jy930accPWB0";
    $captcha = $_POST['g-recaptcha-response'];
    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL => 'https://www.google.com/recaptcha/api/siteverify',
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => [
            'secret' => $secretKey,
            'response' => $captcha,
            'remoteip' => $_SERVER['REMOTE_ADDR']
        ],
        CURLOPT_RETURNTRANSFER => true
    ]);

    $output = curl_exec($ch);
    curl_close($ch);

    $json = json_decode($output);

    if (isset($json->success) && $json->success) {
        echo 'error';
    } else {
        
        if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password2'])) {

            $email = $_POST['email'];
            $password = $_POST['password'];
            $password2 = $_POST['password2'];
            $error = false;

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);


            $email_session = $_SESSION['email'];
            $_SESSION['email'] = $email;
            

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
                    echo "location richtig";
                    // header("location:../ausweis/ausweis_form.php");
                    header("location:../ausweiss.php");
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
    }
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
    <!-- <?php include '../helpers/darkmodes.php'; ?> -->


    <!-- <style>
        @import url('https://fonts.googleapis.com/css2?family=Ubuntu+Mono:ital@1&display=swap');

        body {
            font-family: Ubuntu Mono, monospace;
        } -->
    </style>




</head>

<body>
        <div class="container py-5 border mt-5 d-flex justify-content-center h-100 shadow p-3 mb-5 bg-body-tertiary rounded w-25 p-3">
            <div>

                <div class="p-2 d-flex justify-content-center"><img src="logo3.png" alt="logo" width="85%" height="85%"></div>
                <div class="h2 py-2 d-flex justify-content-center">E-Wallet</div>
                <h3 class="h3">Register</h3>

                <form action="" method="POST">
                    <p><label class="" for="username">Enter Your Email Address</label></p>
                    <p><input class="form-control " type="text" type="email" name="email" placeholder="Email"></p>

                    <p><label for="username">Enter Password</label></p>
                    <p><input class="form-control" type="password" type="text" name="password" placeholder="Password"></p>

                    <p><label for="username">Re-Enter Password</label></p>
                    <p><input class="form-control" type="password" type="texpasswordt" name="password2" placeholder="Re-Enter Password"></p>
                    <div class="g-recaptcha" data-sitekey="6LeCwP0mAAAAAAQqOJM58pJVLs_2Jy930accPWB0"></div>
                    <br />
                    <?php if (!empty($confirm_password_err)) {
                        echo '<div class="alert alert-danger" role="alert"> ' .  $confirm_password_err . '</div>';
                    } ?>
                    <?php if (!empty($error_war)) {
                        echo '<div class="alert alert-danger" role="alert"> ' .  $error_war . '</div>';
                    } ?>
                    <p><input class="btn btn-outline-secondary" type="submit" name="login"></p>
                </form>
                <p>Have an account? <a class="text-decoration-none" href="user_login.php">Sign In</a></p>
            </div>

        </div>

</body>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>


</html>
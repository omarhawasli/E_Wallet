<?php
// include 'connection.php';

session_start();

$confirm_password_err = "";

if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password2'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $error = false;

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $_SESSION['email']= $email;

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

        if (count($erg) >= 1) {
            $error_war = "Die email ist schon vergeben";
            // echo '<div class="alert alert-danger" role="alert"> ' .  $error_war . '</div>';
            // echo "<form action='http://localhost//php/Wallet/users/user_register.php'><button type='submit'>Zurück</button></form>";
            exit();
        } else {
            //...........
        }

        $dbh = null;
    } catch (PDOException $e) {

        echo "<br>" . $e->getMessage();
    };


    if ((!password_verify($password2, $hashedPassword))) {
        $confirm_password_err = "The password dosent match";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $confirm_password_err = 'Please enter a valid email address';
    } else if (empty($password)) {
        $confirm_password_err = 'Please provide a password';
    } else {
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

            // echo "Verbindung erfolgreich hergestellt! <br>";

            $db->query($sql);
            $dbh = NULL;
        } catch (PDOException $e) {

            echo "<br>" . $e->getMessage();
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
    

</head>

<body>
    <section>
        <div class="container py-5 border mt-5 d-flex justify-content-center h-100 shadow p-3 mb-5 bg-body-tertiary rounded">
            
            <div>
                <div class="h1 container border py-5 shadow p-5 mb-5 bg-body-tertiary rounded text-primary text-opacity-50">MAKE IT EASY</div>
                <div class="h3">Register</div>

                <form action="" method="POST">
                    <p><label for="username">Enter Your Email Address</label></p>
                    <p><input class="form-control" type="text" type="email" name="email"></p>

                    <p><label for="username">Enter New Password</label></p>
                    <p><input class="form-control" type="password" type="text" name="password"></p>

                    <p><label for="username">Re-Enter New Password</label></p>
                    <p><input class="form-control" type="password" type="texpasswordt" name="password2"></p>
                    <?php if(!empty($confirm_password_err)) { echo '<div class="alert alert-danger" role="alert"> ' .  $confirm_password_err . '</div>';}?>
                    <p><input class="btn btn-outline-secondary" type="submit"></p>
                </form>
                <p>Have an account? <a class="text-decoration-none" href="user_login.php">Sign In</a></p>
            </div>

        </div>
    </section>

</body>

</html>
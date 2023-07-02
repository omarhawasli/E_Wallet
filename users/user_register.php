<?php
// include 'connection.php';

session_start();

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

        if (count($erg) >= 1) {
            echo "Die email ist schon vergeben";
            echo "<form action='http://localhost//php/Walet/users/User_Register.php'><button type='submit'>Zurück</button></form>";
            exit();
        } else {
            //...........
        }

        $dbh = null;
    } catch (PDOException $e) {

        echo "<br>" . $e->getMessage();
    };



    // Insert neue user

    $sql = "INSERT INTO user(email, password) Values('$email','$hashedPassword');";


    //hashed passwort


    if ((!password_verify($password2, $hashedPassword))) {
        echo "the password dosent match";
        $error = true;
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo 'Please enter a valid email address';
        $error = true;
    } else if (empty($password)) {
        echo 'Please provide a password';
        $error = true;
    } else if ($password2 != $password) {
        echo 'The passwords must match';
        $error = true;
    } else {
        header('location:../users/user_login.php');
    }

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

</head>

<body>
    <section>
        <div class="container py-5 border mt-5 d-flex justify-content-center h-100 shadow p-3 mb-5 bg-body-tertiary rounded">
            <div>
                <h1 class="h1">Register</h1>


                <form action="" method="POST">
                    <p><label for="username">Email</label></p>
                    <p><input class="form-control" type="text" type="email" name="email"></p>

                    <p><label for="username">Password</label></p>
                    <p><input class="form-control" type="text" type="text" name="password"></p>

                    <p><label for="username">Password</label></p>
                    <p><input class="form-control" type="text" type="text" name="password2"></p>

                    <p><input class="btn btn-outline-primary" type="submit"></p>
                </form>
                <p>Have an account? <a class="text-decoration-none" href="user_login.php">Sign In</a></p>
            </div>

        </div>
    </section>

</body>

</html>
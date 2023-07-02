<?php

session_start();

if (isset($_POST['email']) && isset($_POST['password'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $error = false;

    $query = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";

    try {

        $dbname = 'wallet';
        $servername = 'localhost';
        $user = 'root';
        $pass = '';


        $db = new PDO(
            "mysql:dbname=$dbname; host=$servername",
            $user,
            $pass
        );

        // echo "Verbindung erfolgreich hergestellt! <br>";
        $res = $db->query($query);
        $erg = $res->fetchAll(PDO::FETCH_ASSOC);


        $db = NULL;
    } catch (PDOException $e) {

        echo "<br>" . $e->getMessage();
    }
} else {
    $_POST['username'] = NULL;
    $_POST['password'] = NULL;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include 'helpers/bootstrap.php'; ?>

</head>

<body>
    <div class="container py-5 border mt-5 d-flex justify-content-center h-100">
        <div>
            <h1 class="h1">login</h1>

            <div>
                <form action="?login=1" method="POST">
                    <p><label for="username">email</label></p>
                    <p><input type="text" name="email"><?php echo '$res[""]'?></p>
                    <p><label for="username">Password</label></p>
                    <p><input type="text" name="password"></p>
                    <p><input type="submit"></p>
                </form>
                <a href="user_email_update.php">Forgot password?</a>
                <p>Don't have an account? <a href="user_register.php">Sign up</a></p>
            </div>

        </div>
    </div>

</body>

</html>
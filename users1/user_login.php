<?php



$password_warning = "";

if (isset($_POST['email']) && isset($_POST['password'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $error = false;
    session_start();
    $_SESSION['email'] = $email; //$_POST['email'];

    $query = "SELECT * FROM user WHERE email = '$email' OR password = $password";


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

        if (empty($email) && empty($password)) {
            $password_warning = "Email und Password sind Leer, bitte geben sie eine ein";
        } else if (empty($email)) {
            $password_warning = "Email ist Leer!";
        } else if (empty($password)) {
            $password_warning = "Password ist Leer!";
        }


        #checking ob die email-adresse nur einmal in Database ist
        $hashed = $erg[0]['password'];
        if (count($erg) >= 1) {

            if (!password_verify($password, $hashed)) {
                $password_warning =  "Password ist invalid, Please Try Again Later";
            } else{
                $_SESSION['Login'] = true;
                header("location:../home.php");
                // SESSIONS SETZEN
                // REDIRECT TO USER START 
            }
        } else {
            $password_warning =  "Die Email ist nicht registriert";
        }




        $db = NULL;
    } catch (PDOException $e) {

        echo "<br>" . $e->getMessage();
    }
} else {
    $_POST['email'] = NULL;
    $_POST['password'] = NULL;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <?php include '../helpers/bootstrap.php'; ?>
    
</head>

<body>
    <div class="container py-5 border mt-5 d-flex justify-content-center h-100 shadow p-3 mb-5 bg-body-tertiary rounded">
        <div>
            <h1 class="h1">Login</h1>
            <form action="?login=1" method="POST">

                <p><label for="username">Enter Your Email Address</label></p>
                <p><input class="form-control" type="text" placeholder="Email" name="email"></p>

                <p><label for="username">Enter New password</label></p>
                <p><input class="form-control" type="password" placeholder="passowrd" name="password"></p>

                <p><input class="btn btn-outline-secondary" type="submit" name="login"></p>

                <?php
                if (!empty($password_warning)) { echo '<div class="alert alert-danger" role="alert"> ' .  $password_warning . '</div>';} ?>
            </form>

            <a class="text-decoration-none" href="user_email_update.php">Forgot password?</a>
            <p>Don't have an account? <a class="text-decoration-none" href="user_register.php">Sign up</a></p>
        </div>

    </div>
    </div>

</body>

</html>
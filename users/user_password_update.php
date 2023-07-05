<?php
// include 'connection.php';

session_start();

$password_match = "";
$leere_email = "";

if (isset($_POST['newpassword']) && isset($_POST['newpassword2'])) {

    $newpassword = $_POST['newpassword'];
    $newpassword2 = $_POST['newpassword2'];
    $email = $_POST['email'];
    $hashedPassword = password_hash($newpassword, PASSWORD_DEFAULT);

    // $userid = $_SESSION['userid'];
    $error = false;

    $sql = "UPDATE user SET password ='$hashedPassword' WHERE email = '$email' ;";


    try {

        $dbname = 'wallet';
        $servername = 'localhost';
        $user = 'root';
        $password = '';


        $db = new PDO(
            "mysql:dbname=$dbname; host=$servername",
            $user,
            $password
        );

        // echo "Verbindung erfolgreich hergestellt! <br>";

        $res = $db->query($sql);

        if (empty($email)){
            $leere_email = "Email  is empty";
        } else if (empty($password)) {
            $leere_email = "Password is empty";
        } else if ($newpassword != $newpassword2) {
            $password_match = "Password dosen't Match";
        } else {
            header('location:user_login.php');
        }


        $dbh = null;

        // $db->query($sql);
    } catch (PDOException $e) {

        echo "<br>" . $e->getMessage();
    }
} else {
    $_POST['newpassword'] = NULL;
    $_POST['email'] = NULL;
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
    <div class="container py-5 border mt-5 d-flex justify-content-center h-100 shadow p-3 mb-5 bg-body-tertiary rounded">
        <div>
            <h1 class="h1">Trouble logging in?</h1>
            <h5>Enter Your Email and New Password</h4>

                <form action="" method="POST">
                    <p><label for="email">Enter Your Email Address</label></p>
                    <p><input class="form-control" type="text" name="email"></p>
                    <p><label for="newpassword">Enter New password</label></p>
                    <p><input class="form-control" type="password" name="newpassword"></p>
                    <p><label for="newpassword">Re-Enter New password</label></p>
                    <p><input class="form-control" type="password" name="newpassword2"></p>

                    <?php
                    if (!empty($password_match)) {
                        echo '<div class="alert alert-danger" role="alert"> ' .  $password_match . '</div>';
                    } else if (!empty($leere_email)) {
                        echo '<div class="alert alert-danger" role="alert"> ' .  $leere_email . '</div>';
                    }
                    ?>

                    <p><input class="btn btn-outline-secondary" type="submit" id="button" </p>
                </form>
        </div>
    </div>

</body>

</html>
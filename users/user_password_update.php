<?php
// include 'connection.php';

session_start();

if (isset($_POST['newpassword']) && isset($_POST['newpassword2'])) {
    $newpassword = $_POST['newpassword'];
    $newpassword2 = $_POST['newpassword2'];
    $email = $_POST['email'];

    // $userid = $_SESSION['userid'];
    $error = false;

    $sql = "UPDATE user SET password ='$newpassword' WHERE email = '$email' ;";


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

    if($newpassword != $newpassword2){
        echo "Passwörte sollen abgestimmt werden";
    }else if(empty($email)){
        echo "Ein email muss eingegeben werden";
    }else{
        header('location:ausweiss.php');
    }

        $res = $db->query($sql);
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
            <h1 class="h4">Trouble logging in?</h1>
            <p>enter your email and new password</p>

            <form action="" method="POST">
                <p><label for="email">email</label></p>
                <p><input type="text" name="email"></p>
                <p><label for="newpassword">New password</label></p>
                <p><input type="text" name="newpassword"></p>
                <p><label for="newpassword">New password</label></p>
                <p><input type="text" name="newpassword2"></p>
                <p><input type="submit" id="button" </p>
            </form>
        </div>
    </div>

</body>

</html>


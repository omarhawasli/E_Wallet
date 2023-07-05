<?php
// include 'connection.php';

session_start();

$email_warning = "";

if (isset($_POST['email'])) {


    $email = $_POST['email'];
    $error = false;

    $query = "SELECT * FROM user WHERE email = '$email'";


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

        $res = $db->query($query);
        $erg = $res->fetchAll(PDO::FETCH_ASSOC);


        // var_dump($erg);
        // echo $erg[0]['email'];

        if (!$erg) {
            $email_warning = "email ist invalid";
        } else {
            header('location:user_password_update.php');
        }


        $dbh = null;
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
            <p>Enter Your Email Address</p>

            <form action="" method="POST">
                <p><input class="form-control" type="text" placeholder="Email" name="email"></p>
                <?php if(!empty($email_warning)) { echo '<div class="alert alert-danger" role="alert"> ' . $email_warning . '</div>';}?>
                <p><input class="btn btn-outline-secondary" type="submit" id="button" </p>

            </form>
        </div>
    </div>

</body>

</html>

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
            <p>enter your email adresse</p>

            <form action="" method="POST">
                <p><input type="text" placeholder="Email" name="email"></p>

                <p><input type="submit" id="button" </p>
            </form>
        </div>
    </div>

</body>

</html>



<?php
// include 'connection.php';

session_start();

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

        echo "Verbindung erfolgreich hergestellt! <br>";

        $res = $db->query($query);
        $erg = $res->fetchAll(PDO::FETCH_ASSOC);


        if (!$erg) {
            echo "Datei nicht im DB";
        } else {

            foreach ($erg as $el) {

                echo $el['email'];

                if ($email == $el['email']) {
                    header('location:user_password_update.php');
                    $error = false;
                } else {
                    echo "geben sie eine gültiger email adresse";
                    $error = true;
                }
            }
            echo "Bitte geben sie eine gültiger email";
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


<?php
session_start();
session_destroy();
$_SESSION['Login'] = false;


if (!$_SESSION['Login']) {
    header('location:../users/user_login.php');
} else {
    $userid = $_SESSION['Login'];
}



echo "Logout erfolgreich";

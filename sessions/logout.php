<?php
session_start();
session_destroy();

if (!isset($_SESSION['userid'])) {
    header('location:login.php');
} else {
    $userid = $_SESSION['userid'];
    echo "Willkommen";
}

$_SESSION['Login'] = true;

echo "Logout erfolgreich";

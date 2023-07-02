<?php


    const dbname = 'wallet';
    const servername = 'localhost';
    const user = 'root';
    const password = '';

try {


    $db = new PDO(
        "mysql:dbname=$dbname; host=$servername",
        $user,
        $password
    );

    echo "Verbindung erfolgreich hergestellt! <br>";

    // $db->query($sql);
    // $dbh = null;
} catch (PDOException $e) {

    echo "<br>" . $e->getMessage();
}
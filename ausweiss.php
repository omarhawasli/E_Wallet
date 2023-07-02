<?php 
// include 'session.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include 'helpers/bootstrap.php'; ?>
</head>
<body>
    <div class="container">
        <h1>Ausweiß formula</h1>
    </div>
    <div class="container">
        <form action="" method="POST">

            <p><label for="name">Ausweiß Nummer</label></p>
            <p><input type="text" name="ausweissnummer"></p>

            <p><label for="name">Name</label></p>
            <p><input type="text" name="name"></p>

            <p><label for="name">Vorname</label></p>
            <p><input type="text" name="vorname"></p>

            <p><label for="name">Geburstag</label></p>
            <p><input type="text" name="geburstag"></p>

            <p><label for="name">Geschlecht</label></p>
            <p><input type="text" name="geschlecht"></p>

            <p><label for="name">Staatsangehörigkeit</label></p>
            <p><input type="text" name="Staatsangehoerigkeit"></p>


            <p><a href="user_login.php">Logout</a></p>
        </form>
    </div>
    

</body>
</html>
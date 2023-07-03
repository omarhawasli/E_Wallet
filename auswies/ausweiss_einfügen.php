<?php
session_start();
$error_msg = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        echo "OK";
        // exit();
    }

if (isset($_POST['ausweissnummer'])) {
    include '../connection.php';

    $ausweis_Nr = $_POST['ausweissnummer'];
    $name = $_POST['name'];
    $vorname = $_POST['vorname'];
    $geschlecht = $_POST['geschlecht'];
    $geburstag = $_POST['geburstag'];
    $geburstort = $_POST['geburstort'];
    $Staatsangehoerigkeit = $_POST['Staatsangehoerigkeit'];
    $große = $_POST['große'];
    $straße = $_POST['straße'];
    $haus_Nr = $_POST['haus_Nr'];
    $plz = $_POST['plz'];
    $ort = $_POST['ort'];


    #  Picture Uploading
    if (isset($_FILES['bild'])) {
        # get data and store them in var
        $img_name  = $_FILES['bild']['name'];
        $tmp_name  = $_FILES['bild']['tmp_name'];
        $error  = $_FILES['bild']['error'];


        if ($error == 0) {

            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);
            $allowed_exs = array("jpg", "jpeg", "png");

            if (in_array($img_ex_lc, $allowed_exs)) {

                $new_img_name = $ausweis_Nr . '.' . $img_ex_lc;
                $img_upload_path = 'upload/' . $new_img_name;

                move_uploaded_file($tmp_name, $img_upload_path);
            } else {

                $e = "You can't upload files of this type";
                header("Location:ausweiss_einfügen.php?error=$e");
                echo $e;
                exit;
            }
        }
    }


    $error_msg = "";


    if (isset($new_img_name)) {

        $sql = "INSERT INTO `ausweiss`(`ausweiss_Nr`, `name`, `vorname`,`geschlecht`, `geburtstag`, `geburtsort`, `staatsangehoerigkeit`, `große`, `Strasse`, `hausnummer`, `plz`, `ort`, `bild`) 
        VALUES ('$ausweis_Nr','$name','$vorname','$geschlecht','$geburstag','$geburstort','$Staatsangehoerigkeit','$große','$straße','$haus_Nr','$plz','$ort','$img_upload_path');";
        $dbh->query($sql);
        $dbh = NULL;
        header("Location:../karten/karten_auswahl.php");

    }else{

        $error_msg = "Please insert Data";
    }
} else {

    $_POST['ausweissnummer'] = NULL;
}
?>


<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php include '../helpers/bootstrap.php'; ?>
    <?php include '../helpers/darkmodes.php'; ?>
    <title>Ausweis</title>

</head>

<body>

    <div class="container p-5">
        <h1>Ausweiß formula</h1>
        <form action="?ausweiss_einfügen=1" method="POST">

            <?php
            if ($error_msg != "") {
                echo '<div class="alert alert-danger" role="alert"> ' .  $error_msg . '</div>';
            }
            ?>

            <p><label class="form-label" for="ausweisnummer">Ausweiß Nummer *</label></p>
            <p><input class="form-control" type="text" id="ausweisnummer" name="ausweissnummer"></p>

            <p><label class="form-label" for="name">Name *</label></p>
            <p><input class="form-control" type="text" id="name" name="name"></p>

            <p><label class="form-label" for="vorname">Vorname *</label></p>
            <p><input class="form-control" type="text" id="vorname" name="vorname"></p>

            <p><label class="form-label" for="name">geschlecht *</label></p>
            <p><select name="geschlecht" class="form-control">
                    <option>Männlich</option>
                    <option>Weiblich</option>
                </select></p>

            <p><label class="form-label" for="geburstag">Geburstag *</label></p>
            <p><input class="form-control" type="date" name="geburstag"></p>

            <p><label class="form-label" for="geburstort">GeburstOrt *</label></p>
            <p><input class="form-control" type="text" name="geburstort"></p>

            <p><label class="form-label" for="Staatsangehoerigkeit">Staatsangehörigkeit *</label></p>
            <p><input class="form-control" type="text" name="Staatsangehoerigkeit"></p>
            <p><label class="form-label" for="große">Große(cm) *</label></p>
            <p><input class="form-control" type="text" name="große"></p>

            <p><label class="form-label" for="straße">Straße *</label></p>
            <p><input class="form-control" type="text" name="straße"></p>

            <p><label class="form-label" for="haus_Nr">Hausnummer *</label></p>
            <p><input class="form-control" type="text" name="haus_Nr"></p>

            <p><label class="form-label" for="plz">PLZ *</label></p>
            <p><input class="form-control" type="text" name="plz"></p>

            <p><label class="form-label" for="ort">Ort *</label></p>
            <p><input class="form-control" type="text" name="ort"></p>


            <p><label class="form-label" for="bild">Bild *</label></p>
            <input class="form-control" type="file" name="bild"><br>


            <button class="form-control" type="submit" name="Senden">Senden</button>

        </form>
    </div>

</body>

</html>


<?php


?>
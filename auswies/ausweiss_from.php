<?php
session_start();

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
        <form action="ausweis_control.php" method="POST">

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
            <p><input class="form-control" type="date" id="geburstag" name="geburstag"></p>

            <p><label class="form-label" for="geburstort">GeburstOrt *</label></p>
            <p><input class="form-control" type="text" id="geburstort" name="geburstort"></p>

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

            <button class="form-control">Logout<a href="../sessions/logout.php"></a></button>

        </form>
    </div>

</body>

</html>
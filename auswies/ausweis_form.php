<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ausweis</title>
    <?php include '../helpers/bootstrap.php'; ?>
    <?php include '../helpers/darkmodes.php'; ?>
</head>

<body>

    <div class="container p-5">
        <h1>Ausweiß formula</h1>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <form action="../sessions/logout.php" method="POST">
                <button class="btn btn-outline-secondary">Logout<a href="../sessions/logout.php"></a></button>

            </form>
        </div>
        <div class="container p-5">


            <form action="ausweis_einfügen.php" method="POST" enctype="multipart/form-data">
                <p><label class="form-label" for="ausweissnummer">Ausweiß Nummer *</label></p>
                <p><input class="form-control" type="text" name="ausweissnummer" required></p>

                <p><label class="form-label" for="name">Name *</label></p>
                <p><input class="form-control" type="text" name="name" required></p>

                <p><label class="form-label" for="vorname">Vorname *</label></p>
                <p><input class="form-control" type="text" name="vorname" required></p>

                <p><label class="form-label" for="geschlecht">Geschlecht *</label></p>
                <p><select name="geschlecht" class="form-control">
                        <option>Männlich</option>
                        <option>Weiblich</option>
                    </select></p>

                <p><label class="form-label" for="geburstag">Geburstag *</label></p>
                <p><input class="form-control" type="date" name="geburstag" required></p>

                <p><label class="form-label" for="geburstort">GeburstOrt *</label></p>
                <p><input class="form-control" type="text" name="geburstort" required></p>

                <p><label class="form-label" for="Staatsangehoerigkeit">Staatsangehörigkeit *</label></p>
                <p><input class="form-control" type="text" name="Staatsangehoerigkeit" required></p>

                <p><label class="form-label" for="große">Große(cm) *</label></p>
                <p><input class="form-control" type="text" name="große" required></p>

                <p><label class="form-label" for="straße">Straße *</label></p>
                <p><input class="form-control" type="text" name="straße" required></p>

                <p><label class="form-label" for="haus_Nr">Hausnummer *</label></p>
                <p><input class="form-control" type="text" name="haus_Nr" required></p>

                <p><label class="form-label" for="plz">PLZ *</label></p>
                <p><input class="form-control" type="text" name="plz" required></p>

                <p><label class="form-label" for="name">Ort *</label></p>
                <p><input class="form-control" type="text" name="ort" required></p>

                <p><label class="form-label" for="name">Bild *</label></p>
                <input class="form-control" type="file" name="bild"><br>

                <button class="btn btn-outline-secondary" type="submit" name="Senden">Senden</button>


    </form>
        </div>
    </div>




</body>

</html>
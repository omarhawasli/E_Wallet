<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karte Auswählen</title>
    <?php include '../helpers/bootstrap.php'; ?>
    <?php include '../helpers/darkmodes.php'; ?>

    

</head>

<body>
    <div class="container p-5">
        <h1>Karte Auswählen</h1>
        <form action="index.php" method="post" class="shadow-lg p-5 mb-5 bg-body-tertiary rounded">


            <div class="shadow-lg p-5 mb-5 bg-body-tertiary rounded">
                <img src="../img/führerschein.jpg" width="250" height="150">
                <span><input type="checkbox" name="fuhrerschein" >Führerschein</span>
            </div>

            <div class="shadow-lg p-5 mb-5 bg-body-tertiary rounded">
                <img src="../img/versicherrungkarte.jpg" width="250" height="150">
                <span><input type="checkbox" name="versicherung">Versicherrungkarte</span>
            </div>

            <div class="shadow-lg p-5 mb-5 bg-body-tertiary rounded">
                <img src="../img/deutschlanttiket.jpg" width="250" height="150">
                <span><input type="checkbox" name="fahrkarte">Fahrkarte</span>
            </div>
            <button class="btn btn-outline-secondary" type="submit">Fertig</button>
        </form>
    </div>


</body>


</html>
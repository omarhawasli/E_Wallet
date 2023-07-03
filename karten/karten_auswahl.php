<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karte Auswählen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    
</head>

<body>
<h1>Karte Auswählen</h1>
    <form action="index.php" method="post" class="shadow-lg p-3 mb-5 bg-body-tertiary rounded" >
            
        
        <div>
            <img src="../img/führerschein.jpg" width="250" height="150">
            <p><input type="checkbox" name="fuhrerschein">Führerschein</p>
        </div>

        <div>
            <img src="../img/versicherrungkarte.jpg" width="250" height="150">
            <p><input type="checkbox" name="versicherung">Versicherrungkarte</p>
        </div>

        <div> 
            <img src="../img/deutschlanttiket.jpg" width="250" height="150">
            <p><input type="checkbox" name="fahrkarte">Fahrkarte</p>
        </div> 
        <button class="btn btn-primary" type="submit">Fertig</button>
    </form>

    

</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karte Auswählen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <style>
        body {
    text-align: center;
    padding: 50px;
}
    </style>
    
</head>

<body>
<h1 class=" h1 container mt-2 py-4 d-flex justify-content-center h-500  p-3 mb-2 bg-body-tertiary rounded" >Karte Auswählen</h1>
   <div class="container py-5 border mt-4 d-flex justify-content-center h-100 shadow p-3 mb-5 bg-body-tertiary rounded w-25 p-3" >
    <form action="index.php" method="post"  >
            
        
        <div>
            <img src="img/führerschein.jpg" width="250" height="150">
            <p><input type="checkbox" name="fuhrerschein">Führerschein</p>
        </div>

        <div>
            <img src="img/versicherrungkarte.jpg" width="250" height="150">
            <p><input  type="checkbox" name="versicherung">Versicherrungkarte</p>
        </div>

        <div> 
            <img src="img/d_ticket.jpg" width="250" height="150">
            <p><input type="checkbox" name="fahrkarte">Fahrkarte</p>
        </div> 
        <button class="btn btn-outline-secondary" type="submit">Fertig</button>
    </form>
    </div>

    

</body>

</html>
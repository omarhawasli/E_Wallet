<?php 
  session_start();

  if (!isset($_SESSION['username'])) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
   
    <title>Ausweis</title>
    <style>
    body {
    text-align: center;
}
form {
    display: inline-block;
    padding-top: 25px;
    padding-bottom: 25px;
}

    </style>

</head>
<body  >
<h1 class=" h1 container mt-2 py-4 d-flex justify-content-center h-500  p-3 mb-2 bg-body-tertiary rounded" >Ausweiß formula</h1>
    
    <div class="container py-5 border mt-2 d-flex justify-content-center h-100 shadow p-3 mb-5 bg-body-tertiary rounded w-25 p-3">
         
        <form  action="ausweis_control.php" method="POST" enctype="multipart/form-data">

        

            <p><label class="form-label" for="name">Ausweiß Nummer *</label></p>
            <p><input class="form-control" type="text" name="ausweissnummer"  maxlength="9" required></p>

            <p><label class="form-label" for="name">Name *</label></p>
            <p><input class="form-control" type="text" name="name" required></p>

            <p><label class="form-label" for="name">Vorname *</label></p>
            <p><input class="form-control" type="text" name="vorname" required></p>

            <p><label class="form-label" for="name">Geschlecht *</label></p>
            <p><select name="geschlecht" class="form-control">
                <option>Männlich</option>
                <option>Weiblich</option>
            </select></p>

            <p><label class="form-label" for="name">Geburstag *</label></p>
            <p><input class="form-control" type="date" name="geburstag" required></p>

            <p><label class="form-label" for="name">GeburstOrt *</label></p>
            <p><input class="form-control" type="text" name="geburstort" required></p>

            <p><label class="form-label" for="name">Staatsangehörigkeit *</label></p>
            <p><input class="form-control" type="text" name="Staatsangehoerigkeit" required></p>

            <p><label class="form-label" for="name">Ablauf datum *</label></p>
            <p><input class="form-control" type="date" name="ablauf_datum" required></p>

            <p><label class="form-label" for="name">Straße *</label></p>
            <p><input class="form-control" type="text" name="straße" required></p>

            <p><label class="form-label" for="name">Hausnummer *</label></p>
            <p><input class="form-control" type="text" name="haus_Nr" required></p>

            <p><label class="form-label" for="name">PLZ *</label></p>
            <p><input class="form-control" type="text" name="plz" required></p>

            <p><label class="form-label" for="name">Ort *</label></p>
            <p><input class="form-control" type="text" name="ort" required></p>

           
            <p><label class="form-label" for="name">Bild *</label></p>
	         <input class="form-control"  type="file" name="bild"  ><br>
	         
    
            <button class="btn btn-outline-secondary" style="margin-top: 20px;" type="submit" name="Senden">Senden</button>
            
        </form>
    </div>
   
 </body>
</html>
<?php
  }else{
  	header("Location:home.php");
   	exit;
  }
 ?>
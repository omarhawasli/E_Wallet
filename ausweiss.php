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
h1{ padding-top: 35px;
    padding-bottom: 30px;
    text-shadow: 0 0 3px #0000ff;
}
    </style>

</head>
<body  >
    
    <div style="align-items: center;">
         <h1>Ausweiß formula</h1>
        <form  action="ausweis_control.php" method="POST" enctype="multipart/form-data">

        

            <p><label class="form-label" for="name">Ausweiß Nummer *</label></p>
            <p><input class="form-control" type="text" name="ausweissnummer" required></p>

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

            <p><label class="form-label" for="name">Große(cm) *</label></p>
            <p><input class="form-control" type="text" name="große" required></p>

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
	         
    
            <button class="form-control" style="margin-top: 20px;" type="submit" name="Senden">Senden</button>
            
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
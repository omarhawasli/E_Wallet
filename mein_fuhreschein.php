<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <?php include 'connection.php'; ?>
    <link rel="stylesheet" href="helpers/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cedarville+Cursive&display=swap" rel="stylesheet">
    
    <style>
     div{
        width: 569px;
        height: 360px;
        background-image: url("img/fuhreschein.jpg");
        background-size: cover;
     }   
    img{
        width: 143px;
        height: 177px;
        position: absolute;
        left: 57px;
        top: 145px;
        opacity: 0.7;
    }
    .führe_Nr{
        position: absolute;
        left: 230px;
        top: 233px;
        opacity: 0.7;
    }
    .name{
        position: absolute;
        left: 230px;
        top: 82px;
        opacity: 0.7;
        
    }
    .vorname{
        position: absolute;
        left: 230px;
        top: 125px;
        opacity: 0.7;
    }
    .g_tag{
        position: absolute;
        left: 230px;
        top: 145px;
        opacity: 0.7;
    
    }
    .g_ort{
        position: absolute;
        left: 370px;
        top: 145px;
        opacity: 0.7;
    }
    .ann_datum{
        position: absolute;
        left: 230px;
        top: 167px;
        opacity: 0.7;
    }
    .land{
        position: absolute;
        left: 390px;
        top: 167px;
        opacity: 0.7;
    }
    .ab_datum{
        position: absolute;
        left: 230px;
        top: 210px;
        opacity: 0.7;
    }
    .ort{
        position: absolute;
        left: 230px;
        top: 188px;
        opacity: 0.7;
    }
    .sgin{
        position: absolute;
        left: 310px;
        top: 270px;
        font-family: 'Cedarville Cursive', cursive;
        font-size:40px;
        opacity: 0.7;
    }

    </style>
    <title>Home</title>
</head>
<body>
<?php session_start();  ?>
<div>
<?php
 $ausweis_id=$_SESSION['ausweiss_id'];
if(true){
      
    $sql_fuhreschein= "SELECT führeschen_Nr, ablauf_datum, annahme_datum
    FROM führeschein WHERE ausweiss_id='$ausweis_id';";

  $rueckgabe = $dbh->query($sql_fuhreschein);
  $erg = $rueckgabe->fetchAll(PDO::FETCH_ASSOC);
  $führeschen_Nr = $erg[0]['führeschen_Nr'];
  $ablauf_datum = $erg[0]['ablauf_datum'];
  $annahme_datum = $erg[0]['annahme_datum'];
  
  

  }
  if(true){
      
    $sql_ausweis = "SELECT * FROM ausweiss WHERE ausweiss_id = '$ausweis_id';";


  $rueckgabe = $dbh->query($sql_ausweis);
  $erg = $rueckgabe->fetchAll(PDO::FETCH_ASSOC);
  $name = $erg[0]['name'];
  $vorname = $erg[0]['vorname'];
  $geburstag = $erg[0]['geburtstag'];
  $geburtsort= $erg[0]['geburtsort'];
  $bild = $erg[0]['bild'];
  $ort = $erg[0]['ort'];
  }  


?>
<img src="<?php echo $bild ?>">
<h5 class="führe_Nr" ><?php echo $führeschen_Nr ?></h5>
<h5 class="name" ><?php echo $name ?></h5>
<h5 class="vorname" ><?php echo $vorname ?></h5>
<h5 class="g_tag" ><?php echo $geburstag ?></h5>
<h5 class="g_ort" ><?php echo $geburtsort ?></h5>
<h5 class="ann_datum" ><?php echo $annahme_datum ?></h5>
<h5 class="ab_datum" ><?php echo $ablauf_datum ?></h5>
<h5 class="ort" > Verkehr <?php echo $ort ?></h5>
<h5 class= "sgin"><?php echo $name ?></h5>
<h5 class= "land">Landesbetrieb</h5>


</div>
<form action="home.php" method="POST">
    <button class="btn btn-outline-secondary" type="submit" name="submit"> Back</button>
</form>

</body>
</html>
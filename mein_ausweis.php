<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <?php include 'connection.php'; ?>
    <link rel="stylesheet" href="helpers/style.css">
    <style>
     div{
        width: 569px;
        height: 360px;
        background-image: url("img/ausweis1.jpg");
        background-size: cover;
        
     }   
    img{
        width: 215px;
        height: 273px;
        position: absolute;
        left: 72px;
        top: 125px;
        opacity: 0.7;
    }
    .ausweisNr{
        position: absolute;
        left: 450px ;
        top: 60px;

    }
    .name{
        position: absolute;
        left: 325px ;
        top: 145px;
        opacity: 0.7;
    }
    .vorname{
        position: absolute;
        left: 300px ;
        top: 199px;
        opacity: 0.7;
    }
    .g_tag{
        position: absolute;
        left: 300px ;
        top: 250px;
        opacity: 0.7;
    }
    .staats{
        position: absolute;
        left: 425px ;
        top: 250px;
        opacity: 0.7;
    }
    .g_ort{
        position: absolute;
        left: 300px ;
        top: 283px;
        opacity: 0.7;
    }
    .ab_datum{
        position: absolute;
        left: 300px ;
        top: 330px;
        opacity: 0.7;
    }

    </style>
    <title>Home</title>
</head>
<body>
<?php session_start();  ?>
<div>
<?php
$user_id = $_SESSION['user_id'];
if(true){
      
    $sql_ausweis = "SELECT * FROM ausweiss WHERE user_id = '$user_id';";


  $rueckgabe = $dbh->query($sql_ausweis);
  $erg = $rueckgabe->fetchAll(PDO::FETCH_ASSOC);
  $ausweis_Nr = $erg[0]['ausweiss_Nr'];
  $name = $erg[0]['name'];
  $vorname = $erg[0]['vorname'];
  $geburstag = $erg[0]['geburtstag'];
  $geburtsort= $erg[0]['geburtsort'];
  $staats = $erg[0]['staatsangehoerigkeit']	;
  $ablauf_datum = $erg[0]['ablauf_datum'];
  $bild = $erg[0]['bild'];

  }
?>
<img src="<?php echo $bild ?>">
<h2 class="ausweisNr" ><?php echo $ausweis_Nr   ?></h2>
<h5 class="name" ><?php echo $name ?></h5>
<h5 class="vorname" ><?php echo $vorname ?></h5>
<h5 class="g_tag" ><?php echo $geburstag ?></h5>
<h5 class="staats" ><?php echo $staats ?></h5>
<h5 class="g_ort" ><?php echo $geburtsort ?></h5>
<h5 class="ab_datum" ><?php echo $ablauf_datum ?></h5>

</div>

<form action="home.php" method="POST">
    <button class="btn btn-outline-secondary" type="submit" name="submit"> Back</button>
</form>


 
</body>
</html>
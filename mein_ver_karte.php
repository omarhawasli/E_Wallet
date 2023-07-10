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
        background-image: url("img/versicherungkart.jpg");
        background-size: cover;
     }   
    img{
        width: 127px;
        height: 160px;
        position: absolute;
        left: 459px;
        top: 143px;
    }
    .vorname{
        position: absolute;
        left: 80px;
        top: 300px;
        opacity: 0.9;
    }
    .name{
        position: absolute;
        left: 150px;
        top: 300px;
        opacity: 0.9;
    }
    .ver_name{
        position: absolute;
        left: 80px;
        top: 350px;
        opacity: 0.9;
    }
    .ver_Nr{
        position: absolute;
        left: 260px;
        top: 350px;
        opacity: 0.9;
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
       
     $sql_fuhreschein= "SELECT versicher_Nr, versicher_name, ablauf_datum_ver
     FROM versicherung_karte WHERE ausweiss_id='$ausweis_id';";
 
   $rueckgabe = $dbh->query($sql_fuhreschein);
   $erg = $rueckgabe->fetchAll(PDO::FETCH_ASSOC);
   $versicher_Nr = $erg[0]['versicher_Nr'];
   $versicher_name = $erg[0]['versicher_name'];
   $ablauf_datum_ver = $erg[0]['ablauf_datum_ver'];
   
   
 
   }
   if(true){
       
     $sql_ausweis = "SELECT * FROM ausweiss WHERE ausweiss_id = '$ausweis_id';";
 
 
   $rueckgabe = $dbh->query($sql_ausweis);
   $erg = $rueckgabe->fetchAll(PDO::FETCH_ASSOC);
   $name = $erg[0]['name'];
   $vorname = $erg[0]['vorname'];
  
   $bild = $erg[0]['bild'];
   
   }  
 


?>
<img src="<?php echo $bild ?>">
<h4 class="vorname"><?php echo $vorname ?></h4>
<h4 class="name" ><?php echo $name ?></h4>
<h4 class="ver_name" ><?php echo $versicher_name ?></h4>
<h4 class="ver_Nr" ><?php echo $versicher_Nr ?></h4>
</div>
<form action="home.php" method="POST">
    <button class="btn btn-outline-secondary" type="submit" name="submit"> Back</button>
</form>

</body>
</html>
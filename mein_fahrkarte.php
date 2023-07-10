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
        background-image: url("img/fahrkarte1.jpg");
        background-size: cover;
        box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
     }   
    img{
        width: 103px;
        height: 105px;
        position: absolute;
        left: 503px;
        top: 66px;
    }
    .karte_Nr{
        color: aliceblue;
        position: absolute;
        left: 90px;
        top: 163px;
    }
    .vorname{
        position: absolute;
        left: 80px;
        top: 250px;
        opacity: 0.7;
    }
    .name{
        position: absolute;
        left: 160px;
        top: 250px;
        opacity: 0.7;
    }
    .ab_datum{
        position: absolute;
        left: 190px;
        top: 338px;
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
       
     $sql_fuhreschein= "SELECT bahn_karte_Nr, ablauf_datum
     FROM bahn_karte WHERE ausweiss_id='$ausweis_id';";
 
   $rueckgabe = $dbh->query($sql_fuhreschein);
   $erg = $rueckgabe->fetchAll(PDO::FETCH_ASSOC);
   $bahn_karte_Nr = $erg[0]['bahn_karte_Nr'];
   $ablauf_datum = $erg[0]['ablauf_datum'];
   
   
 
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
<h4 class="karte_Nr" ><?php echo $bahn_karte_Nr ?></h4>
<h4 class="ab_datum" ><?php echo $ablauf_datum ?></h4>
</div>

<form action="home.php" method="POST">
    <button class="btn btn-outline-secondary" type="submit" name="submit"> Back</button>
</form>


</body>
</html>
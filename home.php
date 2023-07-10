<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <?php include 'connection.php'; ?>
    <style>
     .center {
  width: 330px;
  height: 600px;
  align-items: center;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  padding: 10px;
  box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
  border-radius: 20px;

}
h4{
     text-align: center;
}
    </style>
    
    <title>Home</title>
</head>
<body>
<div class="center" >
      <?php  
         session_start(); 
        $user_id = $_SESSION['user_id'];
if(true){
      
    $sql_ausweis = "SELECT * FROM ausweiss WHERE user_id = '$user_id';";


       $rueckgabe = $dbh->query($sql_ausweis);
       $erg = $rueckgabe->fetchAll(PDO::FETCH_ASSOC);
       $ausweis_Nr = $erg[0]['ausweiss_Nr'];
       $name = $erg[0]['name'];
       $vorname = $erg[0]['vorname'];
}
      ?>
       <h4><?php echo "Welcome"." ".$vorname." ".$name  ?></h4><br>

        <form  action="mein_ausweis.php">  
            <button class="btn btn-outline-secondary btn-lg w-100 p-2" type="submit">Ausweis</button>
        </form>
        <br>

<?php

if(isset($_POST['fuhreschein_Nr'])&& isset($_POST['ablauf_datum']) && isset($_POST['annahme_datum'])){
    $fuhrerschein_Nr = $_POST['fuhreschein_Nr'];
    $annahme_datum = $_POST['annahme_datum'];
    $ablauf_datum_f = $_POST['ablauf_datum'];
    $user_id = $_SESSION['user_id'];
    if(true){
      
      $ausweis_id = "SELECT ausweiss_id FROM ausweiss WHERE user_id = '$user_id';";


	$rueckgabe = $dbh->query($ausweis_id);
	$erg = $rueckgabe->fetchAll(PDO::FETCH_ASSOC);
	$ausweis_id = $erg[0]['ausweiss_id'];
      $_SESSION['ausweiss_id']= $ausweis_id;

    }
  

    $sql_fuh = "INSERT INTO führeschein(führeschen_Nr, ausweiss_id, annahme_datum, ablauf_datum) 
                                VALUES ('$fuhrerschein_Nr','$ausweis_id', '$annahme_datum', '$ablauf_datum_f');";
     $dbh->query($sql_fuh);  
     //$dbh=null;
}

?>
      
      <form  action="mein_fuhreschein.php">
            <button class="btn btn-outline-secondary btn-lg w-100 p-2" type="submit">Führeschein</button> 
      </form>
      <br>

<?php



 if(isset($_POST['ver_Nr']) && isset($_POST['ver_Name']) && isset($_POST['ablauf_datum_ver'])){
    $ver_Nr = $_POST['ver_Nr'];
    $ver_Name = $_POST['ver_Name'];
    $ablauf_datum_ver = $_POST['ablauf_datum_ver'];
     
    if(true){
      
      $ausweis_id = "SELECT ausweiss_id FROM ausweiss WHERE user_id = '$user_id'";


	$rueckgabe = $dbh->query($ausweis_id);
	$erg = $rueckgabe->fetchAll(PDO::FETCH_ASSOC);
	$ausweis_id = $erg[0]['ausweiss_id'];
      $_SESSION['ausweiss_id']= $ausweis_id;

    }
   
    
    

    $sql_ver ="INSERT INTO versicherung_karte(versicher_Nr, versicher_name, ausweiss_id, ablauf_datum_ver)
                                       VALUES ('$ver_Nr','$ver_Name', '$ausweis_id', '$ablauf_datum_ver');";
      $dbh->query($sql_ver);
      //$dbh=null;
}

?>

      <form  action="mein_ver_karte.php" >
            <button class="btn btn-outline-secondary btn-lg w-100 p-2" type="submit">VersicherungsKarte</button>
      </form>
      <br>

<?php  


 if(isset($_POST['fahrkarte_Nr']) && isset($_POST['ablauf_datum_fk'])){
    $fahrkarte_Nr = $_POST['fahrkarte_Nr'];
    $ablauf_datum_fk = $_POST['ablauf_datum_fk'];

    if(true){
      
      $ausweis_id = "SELECT ausweiss_id FROM ausweiss WHERE user_id = '$user_id'";


	$rueckgabe = $dbh->query($ausweis_id);
	$erg = $rueckgabe->fetchAll(PDO::FETCH_ASSOC);
	$ausweis_id = $erg[0]['ausweiss_id'];
      $_SESSION['ausweiss_id']= $ausweis_id;

    }
    


    $sql_fk ="INSERT INTO bahn_karte(bahn_karte_Nr,ausweiss_id, ablauf_datum)
    VALUES ('$fahrkarte_Nr', '$ausweis_id', '$ablauf_datum_fk')";
   $dbh->query($sql_fk);

 
   
   
 }



?>
 
       <form  action="mein_fahrkarte.php" >
            <button class="btn btn-outline-secondary btn-lg w-100 p-2" type="submit">Fahrkarte</button>
      </form>
      <br><br><br><br><br><br><br><br>
   
<?php   
 

$dbh=null;

?>

<form  action="sessions/logout.php" method="POST">
    <button class="btn btn-outline-secondary btn-lg w-100 p-2" type="submit" name="submit"> logout</button>
</form>

</div>
</body>
</html>
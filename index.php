<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="helpers/style.css">
    
       
    </head>
<body>
    
<h1>Hier Informationen geben</h1>

<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['fuhrerschein']) || isset($_POST['versicherung']) || isset($_POST['fahrkarte']))  {
    // Retrieve the selected checkboxes
    $fuhrerschein = isset($_POST['fuhrerschein']);
    $versicherung = isset($_POST['versicherung']);
    $fahrkarte = isset($_POST['fahrkarte']);
?>
   <!-- // Include the selected pages-->
   <form action="home.php" method="post" class="shadow-lg m-5 w-25 bg-body-tertiary rounded">
      <div>
        <?php if ($fuhrerschein) { ?>
        <div>
        <?php  include('karten/Führeschein.php'); ?>
        </div>
        <?php }if ($versicherung) { ?>
        <div>
        <?php  include('karten/VersicherungsKarte.php'); ?>
        </div>
        <?php } if ($fahrkarte) { ?>
        <div>
        <?php    include('karten/Fahrkarte.php'); ?>
        </div>
        <?php } ?>
        <br>
        <button class="btn btn-primary" type="submit">Senden</button>
      </div>
        
    </form>
    
<?php
}else{
$_POST['fuhrerschein'] = NULL;
$_POST['versicherung'] = NULL;
$_POST['fahrkarte'] = NULL;
}
?>

</body>
</html>
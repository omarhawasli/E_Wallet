<?php

# check if daten submitted
if (
	isset($_POST['ausweissnummer'])
) {


	# database connection file
	include 'connection.php';

	# get data from POST request and store them in var
	$ausweis_Nr = $_POST['ausweissnummer'];
	session_start();
	$_SESSION['ausweissnummer'] = $ausweis_Nr; //
	
    
	$name = $_POST['name'];
	$vorname = $_POST['vorname'];
	$geschlecht = $_POST['geschlecht'];
	$geburstag = $_POST['geburstag'];
	$geburstort = $_POST['geburstort'];
	$Staatsangehoerigkeit = $_POST['Staatsangehoerigkeit'];
	$ablauf_datum = $_POST['ablauf_datum'];
	$straße = $_POST['straße'];
	$haus_Nr = $_POST['haus_Nr'];
	$plz = $_POST['plz'];
	$ort = $_POST['ort'];
	$_SESSION['name'] = $name;
	$_SESSION['vorname'] = $vorname;

	#  Picture Uploading
	if (isset($_FILES['bild'])) {
		# get data and store them in var
		$img_name  = $_FILES['bild']['name'];
		$tmp_name  = $_FILES['bild']['tmp_name'];
		$error  = $_FILES['bild']['error'];

		# if there is not error occurred while uploading
		if ($error === 0) {

			# get image extension store it in var
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);

			/* 
				convert the image extension into lower case 
				and store it in var 
				*/
			$img_ex_lc = strtolower($img_ex);

			/* 
				crating array that stores allowed
				to upload image extension.
				*/
			$allowed_exs = array("jpg", "jpeg", "png");

			/* 
				check if the the image extension 
				is present in $allowed_exs array
				*/
			if (in_array($img_ex_lc, $allowed_exs)) {
				/* 
					 renaming the image with user's ausweis_Nr
					 like: ausweis_Nr.$img_ex_lc
					*/
				$new_img_name = $ausweis_Nr . '.' . $img_ex_lc;

				# crating upload path on root directory
				$img_upload_path = 'upload/' . $new_img_name;

				# move uploaded image to ./upload folder
				move_uploaded_file($tmp_name, $img_upload_path);
			} else {
				$em = "You can't upload files of this type";
				header("Location:ausweiss.php?error=$em");
				exit;
			}
		}
	}
   if(true){
	
	$email = $_SESSION['email'];
	$user_id = "SELECT user_id FROM user WHERE email = '$email'";


	$rueckgabe = $dbh->query($user_id);
	$erg = $rueckgabe->fetchAll(PDO::FETCH_ASSOC);
	$user_id = $erg[0]['user_id'];
    $_SESSION['user_id'] = $user_id;


	 }
	
	# if the user upload  Picture
	if (isset($new_img_name)) {
		
		# inserting data into database
		$sql = "INSERT INTO `ausweiss`(`ausweiss_Nr`, `user_id`, `name`, `vorname`,`geschlecht`, `geburtstag`, `geburtsort`,
			  `staatsangehoerigkeit`, `ablauf_datum`, `Strasse`, `hausnummer`, `plz`, `ort`, `bild`) 
			 VALUES ('$ausweis_Nr','$user_id','$name','$vorname','$geschlecht','$geburstag','$geburstort',
			 '$Staatsangehoerigkeit','$ablauf_datum','$straße','$haus_Nr','$plz','$ort','$img_upload_path');";
		
		$dbh->query($sql);
		$dbh = null;

	# success message
	}



	# redirect to 'index.php' and passing success message
	header("Location:karten_auswahl.php");
	exit;
} else {
	header("Location:ausweiss.php");
	exit;
}

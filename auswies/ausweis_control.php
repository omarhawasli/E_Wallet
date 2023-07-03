<?php

session_start();
# check if daten submitted
if (
	isset($_POST['ausweissnummer'])
) {
	# database connection file
	include 'connection.php';

	# get data from POST request and store them in var
	$ausweis_Nr = $_POST['ausweissnummer'];
	$name = $_POST['name'];
	$vorname = $_POST['vorname'];
	$geschlecht = $_POST['geschlecht'];
	$geburstag = $_POST['geburstag'];
	$geburstort = $_POST['geburstort'];
	$Staatsangehoerigkeit = $_POST['Staatsangehoerigkeit'];
	$große = $_POST['große'];
	$straße = $_POST['straße'];
	$haus_Nr = $_POST['haus_Nr'];
	$plz = $_POST['plz'];
	$ort = $_POST['ort'];


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


	# if the user upload  Picture
	if (isset($new_img_name)) {

		# inserting data into database
		$sql = "INSERT INTO `ausweiss`(`ausweiss_Nr`, `name`, `vorname`,`geschlecht`, `geburtstag`, `geburtsort`,
			`staatsangehoerigkeit`, `große`, `Strasse`, `hausnummer`, `plz`, `ort`, `bild`) 
			VALUES ('$ausweis_Nr','$name','$vorname','$geschlecht','$geburstag','$geburstort',
			'$Staatsangehoerigkeit','$große','$straße','$haus_Nr','$plz','$ort','$img_upload_path');";
		$dbh->query($sql);

		# success message
	}

	# redirect to 'index.php' and passing success message
	header("Location:../karten/karten_auswahl.php");
	exit;
} else {
	header("Location:ausweiss_form.php");
	exit;
}

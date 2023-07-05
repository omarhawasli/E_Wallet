<?php

# check if daten submitted
if (
	isset($_POST['ausweissnummer'])
) {

	include '../connection.php';

	$ausweis_Nr = $_POST['ausweissnummer'];
	session_start();
	$_SESSION['ausweissnummer'] = $ausweis_Nr;

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


	if (isset($_FILES['bild'])) {
		# get data and store them in var
		$img_name  = $_FILES['bild']['name'];
		$tmp_name  = $_FILES['bild']['tmp_name'];
		$error  = $_FILES['bild']['error'];

		if ($error === 0) {

			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);

			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png");
			if (in_array($img_ex_lc, $allowed_exs)) {

				$new_img_name = $ausweis_Nr . '.' . $img_ex_lc;

				$img_upload_path = 'upload/' . $new_img_name;

				move_uploaded_file($tmp_name, $img_upload_path);
			} else {
				$em = "You can't upload files of this type";
				header("Location:ausweiss.php?error=$em");
				exit;
			}
		}
	}

		$sql = "INSERT INTO `ausweiss`(`ausweiss_Nr`, `name`, `vorname`,`geschlecht`, `geburtstag`, `geburtsort`,
			`staatsangehoerigkeit`, `große`, `Strasse`, `hausnummer`, `plz`, `ort`, `bild`) 
			VALUES ('$ausweis_Nr','$name','$vorname','$geschlecht','$geburstag','$geburstort',
			'$Staatsangehoerigkeit','$große','$straße','$haus_Nr','$plz','$ort','$img_upload_path');";
		$dbh->query($sql);

		header("Location:../karten/karten_auswahl.php");
	exit;
} else {
	header("Location:ausweis_form.php");
	exit;
}

?>



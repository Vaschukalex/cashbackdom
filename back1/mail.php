<?php


$brand = $_POST['brand'];
$Site_n = $_POST['Site_n'];
$social = $_POST['social'];
$Name_Ur_lic = $_POST['Name_Ur_lic'];
$Gorod_prisytstvia = $_POST['Gorod_prisytstvia'];
$Vidi_tovarov = $_POST['Vidi_tovarov'];
$Osnovnie_kanali = $_POST['Osnovnie_kanali'];
$Kolvo_komnat = $_POST['Kolvo_komnat'];
$Dolia_rashodow = $_POST['Dolia_rashodow'];
$Opit_isp = $_POST['Opit_isp'];
$Fio_dolzh = $_POST['Fio_dolzh'];
$Contact = $_POST['Contact'];

$servername = "localhost";
$username = "Admin";
$password = "4444";
$dbname = "caschbackdom";

$mysqli = new mysqli($servername, $username, $password, $dbname);
if($mysqli->connect_error){
    die("Connection failed:" . $mysqli->connect_error);
}

$sql ="INSERT INTO anketa_data (brand, Site_n, social, Name_Ur_lic, Gorod_prisytstvia, Vidi_tovarov, Osnovnie_kanali, Kolvo_komnat, Dolia_rashodow, Opit_isp, Fio_dolzh, Contact)
VALUES ('$brand', '$Site_n ', '$social', '$Name_Ur_lic', '$Gorod_prisytstvia', '$Vidi_tovarov', '$Osnovnie_kanali', '$Kolvo_komnat', '$Dolia_rashodow', '$Opit_isp', '$Fio_dolzh', '$Contact')";

if ($mysqli->query($sql) === TRUE){
    echo "Data go";
}
else{
    echo "error:" . $sql . "<br>" . $mysqli->error;
}
$mysqli->close();

$method = $_SERVER['REQUEST_METHOD'];

$c = true;
if ( $method == 'POST' ) {

	$project_name = trim($_POST["project_name"]);
	$admin_email  = trim($_POST["admin_email"]);
	$form_subject = trim($_POST["form_subject"]);

	foreach ( $_POST as $key => $value ) {
		if ( $value != "" && $key != "project_name" && $key != "admin_email" && $key != "form_subject" ) {
			$message .= "
			" . ( ($c = !$c) ? '<tr>':'<tr style="background-color: #f8f8f8;">' ) . "
				<td style='padding: 10px; border: #e9e9e9 1px solid;'><b>$key</b></td>
				<td style='padding: 10px; border: #e9e9e9 1px solid;'>$value</td>
			</tr>
			";
		}
	}
} else if ( $method == 'GET' ) {

	$project_name = trim($_GET["project_name"]);
	$admin_email  = trim($_GET["admin_email"]);
	$form_subject = trim($_GET["form_subject"]);

	foreach ( $_GET as $key => $value ) {
		if ( $value != "" && $key != "project_name" && $key != "admin_email" && $key != "form_subject" ) {
			$message .= "
			" . ( ($c = !$c) ? '<tr>':'<tr style="background-color: #f8f8f8;">' ) . "
				<td style='padding: 10px; border: #e9e9e9 1px solid;'><b>$key</b></td>
				<td style='padding: 10px; border: #e9e9e9 1px solid;'>$value</td>
			</tr>
			";
		}
	}
}

$message = "<table style='width: 100%;'>$message</table>";

function adopt($text) {
	return '=?UTF-8?B?'.Base64_encode($text).'?=';
}

$headers = "MIME-Version: 1.0" . PHP_EOL .
"Content-Type: text/html; charset=utf-8" . PHP_EOL .
'From: '.adopt($project_name).' <'.$admin_email.'>' . PHP_EOL .
'Reply-To: '.$admin_email.'' . PHP_EOL;

mail($admin_email, adopt($form_subject), $message, $headers );
?>
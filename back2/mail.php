<?php


$Fio = $_POST['Fio'];
$Bir_day = $_POST['Bir_day'];
$Mob_tel = $_POST['Mob_tel'];
$Email = $_POST['E-mail'];
$Town_when_buy_kv = $_POST['Town_when_buy_kv'];
$Zastroischik = $_POST['Zastroischik'];
$JK = $_POST['JK'];
$Price_kvartirif = $_POST['Price_kvartiri(from)'];
$Price_kvartirit = $_POST['Price_kvartiri(to)'];
$Kolvo_komnat = $_POST['Kol-vo_komnat'];
$Srok_sdachi = $_POST['Srok_sdachi'];
$Ploschad_kvartirif = $_POST['Ploschad_kvartiri(from)'];
$Ploschad_kvartirit = $_POST['Ploschad_kvartiri(to)'];
$Ploschad_kuhnif = $_POST['Ploschad_kuhni(from)'];
$Ploschad_kuhnit = $_POST['Ploschad_kuhni(to)'];
$Raion = $_POST['Raion'];
$Etazhf = $_POST['Etazh(from)'];
$Etazht = $_POST['Etazh(to)'];
$Etazhnost_domaf = $_POST['Etazhnost_doma(from)'];
$Etazhnost_domat = $_POST['Etazhnost_doma(to)'];
$Material_sten = $_POST['Material_sten'];
$Remont = $_POST['Remont'];
$Data_prosmotra = $_POST['Data_prosmotra'];
$Dop_komenty = $_POST['Dop_komenty'];

$servername = "localhost";
$username = "Admin";
$password = "4444";
$dbname = "caschbackdom";

$mysqli = new mysqli($servername, $username, $password, $dbname);
if($mysqli->connect_error){
    die("Connection failed:" . $mysqli->connect_error);
}

$sql ="INSERT INTO anketa2_data (Fio, Bir_day, Mob_tel, Email, Town_when_buy_kv, Zastroischik, JK, Price_kvartirif, Price_kvartirit, Kolvo_komnat, Srok_sdachi, Ploschad_kvartirif, Ploschad_kvartirit, Ploschad_kuhnif, Ploschad_kuhnit, Raion, Etazhf, Etazht, Etazhnost_domaf, Etazhnost_domat, Material_sten, Remont, Data_prosmotra, Dop_komenty)
VALUES ('$Fio', '$Bir_day', '$Mob_tel', '$Email', '$Town_when_buy_kv', '$Zastroischik', '$JK', '$Price_kvartirif', '$Price_kvartirit', '$Kolvo_komnat', '$Srok_sdachi', '$Ploschad_kvartirif', '$Ploschad_kvartirit', '$Ploschad_kuhnif', '$Ploschad_kuhnit', '$Raion', '$Etazhf', '$Etazht', '$Etazhnost_domaf', '$Etazhnost_domat', '$Material_sten', '$Remont', '$Data_prosmotra', '$Dop_komenty')";

if ($mysqli->query($sql) === TRUE){
    echo "Data go";
}
else{
    echo "error:" . $sql . "<br>" . $mysqli->error;
}
$mysqli->close();

$method = $_SERVER['REQUEST_METHOD'];

$c = true;
if ( $method === 'POST' ) {

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
} else if ( $method === 'GET' ) {

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

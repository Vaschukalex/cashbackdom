<?php

$Fio = mysql_real_escape_string($_POST['Fio']);
$Bir_day = mysql_real_escape_string($_POST['Bir_day']);
$Mob_tel = mysql_real_escape_string($_POST['Mob_tel']);
$Email = mysql_real_escape_string($_POST['E-mail']);
$Town_when_buy_kv = mysql_real_escape_string($_POST['Town_when_buy_kv']);
$Zastroischik = mysql_real_escape_string($_POST['Zastroischik']);
$JK = mysql_real_escape_string($_POST['JK']);
$Price_kvartirif = mysql_real_escape_string($_POST['Price_kvartiri(from)']);
$Price_kvartirit = mysql_real_escape_string($_POST['Price_kvartiri(to)']);
$Kolvo_komnat = mysql_real_escape_string($_POST['Kol-vo_komnat']);
$Srok_sdachi = mysql_real_escape_string($_POST['Srok_sdachi']);
$Ploschad_kvartirif = mysql_real_escape_string($_POST['Ploschad_kvartiri(from)']);
$Ploschad_kvartirit = mysql_real_escape_string($_POST['Ploschad_kvartiri(to)']);
$Ploschad_kuhnif = mysql_real_escape_string($_POST['Ploschad_kuhni(from)']);
$Ploschad_kuhnit = mysql_real_escape_string($_POST['Ploschad_kuhni(to)']);
$Raion = mysql_real_escape_string($_POST['Raion']);
$Etazhf = mysql_real_escape_string($_POST['Etazh(from)']);
$Etazht = mysql_real_escape_string($_POST['Etazh(to)']);
$Etazhnost_domaf = mysql_real_escape_string($_POST['Etazhnost_doma(from)']);
$Etazhnost_domat = mysql_real_escape_string($_POST['Etazhnost_doma(to)']);
$Material_sten = mysql_real_escape_string($_POST['Material_sten']);
$Remont = mysql_real_escape_string($_POST['Remont']);
$Data_prosmotra = mysql_real_escape_string($_POST['Data_prosmotra']);
$Dop_komenty = mysql_real_escape_string($_POST['Dop_komenty']);

$servername = "localhost";
$username = "Admin";
$password = "4444";
$dbname = "caschbackdom";

$admin_email = "a.shbov@yandex.ru";

$mysqli = new mysqli($servername, $username, $password, $dbname);
if ($mysqli->connect_error) {
    die("Connection failed:" . $mysqli->connect_error);
}

$sql = "INSERT INTO anketa2_data (Fio, Bir_day, Mob_tel, Email, Town_when_buy_kv, Zastroischik, JK, Price_kvartirif, Price_kvartirit, Kolvo_komnat, Srok_sdachi, Ploschad_kvartirif, Ploschad_kvartirit, Ploschad_kuhnif, Ploschad_kuhnit, Raion, Etazhf, Etazht, Etazhnost_domaf, Etazhnost_domat, Material_sten, Remont, Data_prosmotra, Dop_komenty)
VALUES ('$Fio', '$Bir_day', '$Mob_tel', '$Email', '$Town_when_buy_kv', '$Zastroischik', '$JK', '$Price_kvartirif', '$Price_kvartirit', '$Kolvo_komnat', '$Srok_sdachi', '$Ploschad_kvartirif', '$Ploschad_kvartirit', '$Ploschad_kuhnif', '$Ploschad_kuhnit', '$Raion', '$Etazhf', '$Etazht', '$Etazhnost_domaf', '$Etazhnost_domat', '$Material_sten', '$Remont', '$Data_prosmotra', '$Dop_komenty')";

if ($mysqli->query($sql) === true) {
    echo "Data go";
} else {
    echo "error:" . $sql . "<br>" . $mysqli->error;
}
$mysqli->close();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $project_name = trim($_POST["project_name"]);
    $form_subject = trim($_POST["form_subject"]);

    foreach ($_POST as $key => $value) {
        if ($value != "" && $key != "project_name" && $key != "form_subject") {
            $message .= "<tr style=\"background-color: #f8f8f8;\">
				<td style='padding: 10px; border: #e9e9e9 1px solid;'><b>$key</b></td>
				<td style='padding: 10px; border: #e9e9e9 1px solid;'>$value</td>
			</tr>
			";
        }
    }
}

$message = "<table style='width: 100%;'>$message</table>";

function adopt($text)
{
    return '=?UTF-8?B?' . Base64_encode($text) . '?=';
}

$headers = "MIME-Version: 1.0" . PHP_EOL .
"Content-Type: text/html; charset=utf-8" . PHP_EOL .
'From: ' . adopt($project_name) . '' . PHP_EOL .
    'Reply-To:' . PHP_EOL;

if (mail($admin_email, adopt($form_subject), $message, $headers)) {
    echo json_encode(['status' => 'success', 'message' => 'All data sent.']);
}else {
    echo json_encode(['status' => 'danger', 'message' => 'error...']);
}

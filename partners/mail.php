<?php

$brand = mysql_real_escape_string($_POST['brand']);
$Site_n = mysql_real_escape_string($_POST['Site_n']);
$social = mysql_real_escape_string($_POST['social']);
$Name_Ur_lic = mysql_real_escape_string($_POST['Name_Ur_lic']);
$Gorod_prisytstvia = mysql_real_escape_string($_POST['Gorod_prisytstvia']);
$Vidi_tovarov = mysql_real_escape_string($_POST['Vidi_tovarov']);
$Osnovnie_kanali = mysql_real_escape_string($_POST['Osnovnie_kanali']);
$Kolvo_komnat = mysql_real_escape_string($_POST['Kolvo_komnat']);
$Dolia_rashodow = mysql_real_escape_string($_POST['Dolia_rashodow']);
$Opit_isp = mysql_real_escape_string($_POST['Opit_isp']);
$Fio_dolzh = mysql_real_escape_string($_POST['Fio_dolzh']);
$Contact = mysql_real_escape_string($_POST['Contact']);

$servername = "localhost";
$username = "Admin";
$password = "4444";
$dbname = "caschbackdom";

$admin_email = "a.shbov@yandex.ru";

$mysqli = new mysqli($servername, $username, $password, $dbname);
if ($mysqli->connect_error) {
    die("Connection failed:" . $mysqli->connect_error);
}

$sql = "INSERT INTO anketa_data (brand, Site_n, social, Name_Ur_lic, Gorod_prisytstvia, Vidi_tovarov, Osnovnie_kanali, Kolvo_komnat, Dolia_rashodow, Opit_isp, Fio_dolzh, Contact)
VALUES ('$brand', '$Site_n ', '$social', '$Name_Ur_lic', '$Gorod_prisytstvia', '$Vidi_tovarov', '$Osnovnie_kanali', '$Kolvo_komnat', '$Dolia_rashodow', '$Opit_isp', '$Fio_dolzh', '$Contact')";

if ($mysqli->query($sql) == true) {
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

mail($admin_email, adopt($form_subject), $message, $headers);

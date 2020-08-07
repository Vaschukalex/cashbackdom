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

$conn = new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error){
    die("Connection failed:" . $conn->connect_error);
}

$sql ="INSERT INTO anketa2_data (Fio, Bir_day, Mob_tel, Email, Town_when_buy_kv, Zastroischik, JK, Price_kvartirif, Price_kvartirit, Kolvo_komnat, Srok_sdachi, Ploschad_kvartirif, Ploschad_kvartirit, Ploschad_kuhnif, Ploschad_kuhnit, Raion, Etazhf, Etazht, Etazhnost_domaf, Etazhnost_domat, Material_sten, Remont, Data_prosmotra, Dop_komenty)
VALUES ('$Fio', '$Bir_day', '$Mob_tel', '$Email', '$Town_when_buy_kv', '$Zastroischik', '$JK', '$Price_kvartirif', '$Price_kvartirit', '$Kolvo_komnat', '$Srok_sdachi', '$Ploschad_kvartirif', '$Ploschad_kvartirit', '$Ploschad_kuhnif', '$Ploschad_kuhnit', '$Raion', '$Etazhf', '$Etazht', '$Etazhnost_domaf', '$Etazhnost_domat', '$Material_sten', '$Remont', '$Data_prosmotra', '$Dop_komenty')";

if ($conn->query($sql) === TRUE){
    echo "Data go";
}
else{
    echo "error:" . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
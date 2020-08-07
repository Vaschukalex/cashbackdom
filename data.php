<?php


$Fio = addslashes($_POST['Fio']);
$Bir_day = addslashes($_POST['Bir_day']);
$Mob_tel = addslashes($_POST['Mob_tel']);
$Email = addslashes($_POST['E-mail']);
$Town_when_buy_kv = addslashes($_POST['Town_when_buy_kv']);
$Zastroischik = addslashes($_POST['Zastroischik']);
$JK = addslashes($_POST['JK']);
$Price_kvartirif = addslashes($_POST['Price_kvartiri(from)']);
$Price_kvartirit = addslashes($_POST['Price_kvartiri(to)']);
$Kolvo_komnat = addslashes($_POST['Kol-vo_komnat']);
$Srok_sdachi = addslashes($_POST['Srok_sdachi']);
$Ploschad_kvartirif = addslashes($_POST['Ploschad_kvartiri(from)']);
$Ploschad_kvartirit = addslashes($_POST['Ploschad_kvartiri(to)']);
$Ploschad_kuhnif = addslashes($_POST['Ploschad_kuhni(from)']);
$Ploschad_kuhnit = addslashes($_POST['Ploschad_kuhni(to)']);
$Raion = addslashes($_POST['Raion']);
$Etazhf = addslashes($_POST['Etazh(from)']);
$Etazht = addslashes($_POST['Etazh(to)']);
$Etazhnost_domaf = addslashes($_POST['Etazhnost_doma(from)']);
$Etazhnost_domat = addslashes($_POST['Etazhnost_doma(to)']);
$Material_sten = addslashes($_POST['Material_sten']);
$Remont = addslashes($_POST['Remont']);
$Data_prosmotra = addslashes($_POST['Data_prosmotra']);
$Dop_komenty = addslashes($_POST['Dop_komenty']);

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
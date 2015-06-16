<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "123";
$database = "labos";


try {
    $db = new PDO("mysql:host=$servername; dbname=$database; charset=utf8", $username, $password);
}
catch(PDOException $e)
{
    echo "Došlo je do greške! <br/>";
    echo $e->getMessage();
}
$upit= "SELECT * FROM Korisnici LIMIT 0, 30 ";

if($_POST['password']!=NULL) {
$kriptirana_lozinka=sha1($_POST['password']);
}

//provjera kakva je sesija "korisnik" . Provjera se vrši ukoliko sesija ne postoji ili ukoliko su post upit i sesija različite, sa time da je post ne jednak od nule
if (($_POST['username'] != $_SESSION['korisnik'] && $_POST['username'] != NULL) || $_SESSION['korisnik'] == NULL) {
    //ukoliko nije postavljena provjerava se u bazi ima li takvih korisnika
    foreach ($db->query($upit) as $provjera)
{
if($provjera['korisnicko_ime'] ===$_POST['username'] && ($provjera['lozinka']==$kriptirana_lozinka))
{
    $_SESSION['korisnik'] = $_POST['username'];
    break;
}
else {
    $_SESSION['korisnik'] = NULL;
}
}
    //ukoliko tog korisnika nema u bazi, onda se vrača na login stranicu
    if ($_SESSION['korisnik'] == NULL) {
        header("Location: login.html");
    }
}
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<link href="master.css" type="text/css" rel="stylesheet">

    <?php
    session_start();
    include 'provjera_login.php';
    ?>

</head>
<body>
<header>
<?php
include 'meni.php';
?>
</header>
	<aside>
	<p>Non ut edam vivo, sed vivam edo.</p>
	</aside>
	
	<article>
	
    <?php

    $i=1;
    $prazni_stringovi=0;
    $brojac_tipa=0;
    $brojac_alergena=0;

    $ime=$_POST['ime'];
    $tip=$_POST['tip'];
    $opis=$_POST['opis'];
    $vege=$_POST['vege'];
    $halal=$_POST['halal'];
    $koser=$_POST['koser'];
    foreach($_POST['alergeni'] as $aler) {
       $alergeni[]=$aler;
    }
    $cijena=$_POST['cijena'];

    //Upit prema bazi

    $servername = "localhost";
    $username = "root";
    $password = "123";
    $database = "labos";

    function stringanje($string)
    {
        $string = filter_var($string, FILTER_SANITIZE_MAGIC_QUOTES);
        return $string;
    }
    try {
        $db = new PDO("mysql:host=$servername; dbname=$database; charset=utf8", $username, $password);
    } catch (PDOException $e) {
        echo "Došlo je do greške prilikom spajanja na bazu! <br/>";
        echo $e->getMessage();
    }
    $tip=stringanje($tip);
    $provjera_tipa="SELECT 'Tip_proizvoda' FROM Proizvodi_tip WHERE Tip_proizvoda='$tip'";
    foreach($db->query($provjera_tipa) as $row){
        $brojac_tipa++;
    }
    //ovo sigurno nije ni približno najbolja metoda kako ovo riješiti, no u ovom trenutku će dostajati
    if(empty($alergeni)) {
        $brojac_alergena++;
    }
    else{
    foreach($alergeni as $qwqw){
    $qwqw=stringanje($qwqw);
    $provjera_alergena="SELECT * FROM Proizvodi_alergeni WHERE Alergeni='$qwqw'";
    foreach($db->query($provjera_alergena) as $row) {
        $alergeni_cijeli.=" ".$row['Alergeni'];
        $brojac_alergena++;
    }}}
    $ime=stringanje($ime);
    if(strlen($ime)<0) $prazni_stringovi++ ;
    $opis=stringanje($opis);
    if(strlen($opis)<0) $prazni_stringovi++;
    if(is_numeric($cijena) && $cijena>0);
    else $prazni_stringovi++;
    $vege=filter_var($vege, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
    $halal=filter_var($halal, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
    $koser=filter_var($koser, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
    if($prazni_stringovi===0 && $brojac_alergena>0 && $brojac_tipa>0 && is_bool($vege) && is_bool($halal) && is_bool($koser)){

    $db->exec("INSERT INTO Proizvodi (Naziv_proizvoda,Tip_proizvoda,Opis_proizvoda,Vege,Halal,Koser,Alergeni,Cijena) VALUES ('$ime', '$tip', '$opis', '$vege', '$halal', '$koser', '$alergeni_cijeli', '$cijena')");

    echo "Uspješno ste unjeli:<br/>
        Naziv proizvoda: ".$ime."<br/>
        Tip proizvoda: ".$tip."<br/>
        Opis proizvoda:".$opis."<br/>
        Vege: ".$vege."</br>
        Halal: ".$halal."<br/>
        Košer: ".$koser."</br>
        Cijena: ".$cijena." kn";
    }
    else{
        echo "Greška pri unosu podataka, zločesto!";
    }
    ?>
	
	</article>
	
	<div class="push"></div>
 	<div style="clear:both;"></div>
	
	<footer>
	<p>Copyright , ZKD , 2015</p>
	</footer>
	
</body>
</html>
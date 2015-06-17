<?php
session_start();
header('charset=utf-8');
include 'provjera_login.php';


$search=$_POST['search_provjera'];
$search=filter_var($search, FILTER_SANITIZE_MAGIC_QUOTES);
//Upit prema bazi
$servername = "localhost";
$username = "root";
$password = "123";
$database = "labos";

// Create connection
try {
    $db = new PDO("mysql:host=$servername; dbname=$database; charset=utf8", $username, $password);
}
catch(PDOException $e)
{
    echo "Došlo je do greške! <br/>";
    echo $e->getMessage();
}
$upit="SELECT * FROM Proizvodi WHERE Naziv_proizvoda LIKE '%$search%' OR Tip_proizvoda LIKE '%$search%' OR Opis_proizvoda LIKE '%$search%'";



include("tcpdf/tcpdf.php");

// stvori novi PDF dokument
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// postavi fontove
// fontovi su UTF8, nalaze se u TCPDF/fonts direktoriju

$pdf->SetFont('helvetica', '', 14, '', true);

$pdf->AddPage();

$pdf->SetXY(15,25);
$pdf->Write(5,"Pretraživali ste: $search");

$x1= 5;
$x2=50;
$x3=85;
$x4=180;
$y=40;
$pdf->SetFont('helveticab', '', 15, '', true);
$pdf->SetXY($x1,$y);
$pdf->Write(5,"Naziv proizvoda");

$pdf->SetXY($x2,$y);
$pdf->Write(5,"Tip proizvoda");

$pdf->SetXY($x3,$y);
$pdf->Write(5,"Opis proizvoda");

$pdf->SetXY($x4,$y);
$pdf->Write(5,"Cijena");

$pdf->SetFont('dejavusans', '', 9, '', true);

//Postoje 2 problema koja nisu riješena.
//1. Ne ispisuje hrvatske znakove ->riješeno, promjenjen font
//2. Ukoliko pređe na drugu stranicu pdf se potrga i ispiše jako puno stranica sa po jednim podatkom na svakoj
foreach($db->query($upit) as $ispis)
{
    $y=$y+7;
    $pdf->SetXY($x1,$y);
    $pdf->Write(5,$ispis['Naziv_proizvoda']);
    $pdf->SetXY($x2,$y);
    $pdf->Write(5,$ispis['Tip_proizvoda']);
    $pdf->SetXY($x3,$y);
    $pdf->Write(5,$ispis['Opis_proizvoda']);
    $pdf->SetXY($x4,$y);
    $pdf->Write(5,$ispis['Cijena']." kn");
}


$pdf->Output("pretraživanje ispis.pdf","I");
?>
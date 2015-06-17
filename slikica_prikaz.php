<?php
header("Content-Type: image/png; charset=utf-8");

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
    $popis_tipova="SELECT Tip_proizvoda FROM Proizvodi_tip";
$lista=array();
//ispisivanje svih tipova proizvoda
foreach($db->query($popis_tipova) as $brojaci)
{
    $lista[$brojaci['Tip_proizvoda']]=0;
}
//brojanje svih tipova proizvoda
    $upit= "SELECT Tip_proizvoda FROM Proizvodi";
foreach($db->query($upit) as $prolazak)
{
    if(array_key_exists($prolazak['Tip_proizvoda'],$lista))
    //spremanje svega u listu u obliku npr. [kolać]=>5 itd.
        $lista[$prolazak['Tip_proizvoda']]++;

}
//ovo je ne dovršeno, vrlo ocito zapravo pogledati imagefilledarc
        $im = @imagecreate(800, 600)
                or die("Cannot Initialize new GD image stream");
                $background_color = imagecolorallocate($im, 0xFF, 0xCC, 0xDD);
            $plava= imagecolorallocate($im,0,0,255);
        imageline($im,10,500,10,100,$plava);
        imageline($im,10,500,790,500,$plava);
        
        //daj sliku kao png
imagepng($im);
//po�isti memoriju
imagedestroy($im);


    ?>
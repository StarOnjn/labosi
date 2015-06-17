<?php
session_start();
include 'provjera_login.php';
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <link href="master.css" type="text/css" rel="stylesheet">
</head>
<body>
<header>
<?php
include 'meni.php';
?>
</header>
<article style="float:left;width:100%">
    <form action="pdf_ispis.php" method="post">
    <label>Upišite traženi pojam:</label>
    <input type="text" name="search_provjera" id="search_provjera" maxlength="20" placeholder="Search" onkeyup="ajax(this.value)">
        <input type="submit" value="PDF ispis">
    </form>
    <script>

        function ajax(var string)
        {
            if (string.length>0)
            {
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
                    document.getElementsByTagName("tr")
                    }
                }
            }
        }

    </script>

    <br/><br/>
<table style="width:100%" border="1">
    <?php

    function da_ne_funkcija($provjera)
    {
        if($provjera==true){
            $vrijednost="Da";
        }
        else{
            $vrijednost="Ne";
        }
        return $vrijednost;
    }
//jquerry
/*    $("#trazi").keyup(kliknuto);

    jQuery.expr[':'].Contains = function(a, i, m) {
        return jQuery(a).text().toUpperCase()
        .indexOf(m[3].toUpperCase()) >= 0;
};

function kliknuto() {
   var trazi= $("#trazi");
  var malaslova = trazi.val().toLowerCase();
  $("tr").toggle(false);
  $("tr td:Contains('"+malaslova+"'):first-child").parent().toggle(true);
*/
///////////////////////////
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

    $tablice="SELECT column_name FROM information_schema.columns WHERE table_name = 'Proizvodi' LIMIT 0 , 30";
    $upit= "SELECT * FROM `Proizvodi` LIMIT 0, 30 ";

    foreach($db->query($tablice) as $popis_tablica)
    {
        print "<th>".$popis_tablica['column_name']."</th>";
    }
        //kreiranje liste
    foreach($db->query($upit) as $ispis)
    {
        print "<tr><td>".$ispis['Naziv_proizvoda']."</td><td>".$ispis['Tip_proizvoda']."</td><td>".$ispis['Opis_proizvoda']."</td><td>".da_ne_funkcija($ispis['Vege'])."</td><td>".da_ne_funkcija($ispis['Halal'])."</td><td>".da_ne_funkcija($ispis['Koser'])."</td><td>".$ispis['Alergeni']."</td><td>".$ispis['Cijena']." kn</td></tr>";
    }

    //Brisanje (makar koliko sam pročitao, ne baš dobra metoda, tj. nedovoljna)
    $db = null;
    ?>
</table>
</article>

<div class="push"></div>
<div style="clear:both;"></div>

<footer>
    <p>Copyright , ZKD , 2015</p>
</footer>

</body>
</html>

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
    print is_string($_POST['ime']);
    echo " IME: ".$_POST['ime']."<br/>";
    print is_string($_POST['tip']);
    echo " TIP: ".$_POST['tip']."<br/>";
    print is_string($_POST['opis']);
    echo " OPIS: ".$_POST['opis']."<br/>";
    print is_bool($_POST['vege']);
    echo " VEGE: ".$_POST['vege']."<br/>";
    print is_bool($_POST['halal']);
    echo " HALAL: ".$_POST['halal']."<br/>";
    print is_bool($_POST['koser']);
    echo " KOŠER: ".$_POST['koser']."<br/>";
    print is_array($_POST['koser']);
    echo " ALERGENI: ";
    foreach($_POST['alergeni'] as $alergeni) {
        print is_string($alergeni)."->";
        echo $alergeni."  ";}
    echo "<br/>";
    print is_numeric($_POST['cijena']);
    echo " CIJENA: ".$_POST['cijena'],"<br/>";
    
    ?>
	
	</article>
	
	<div class="push"></div>
 	<div style="clear:both;"></div>
	
	<footer>
	<p>Copyright , ZKD , 2015</p>
	</footer>
	
</body>
</html>
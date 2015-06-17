<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/html">
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
	<form name="novi_proizvod" action="novi_proizvod_upis.php" method="POST">
	<p>Naziv proizvoda:<input type="text" name="ime" class="input text" required></p>
    <p>Tip proizvoda:
        <select name='tip'>
            <option value="kolač">kolač</option>
            <option value="torta">torta</option>
            <option value="keks">keks</option>
            <option value="čokolada">čokolada</option>
            <option value="piće">piće</option>
            <option value="ostalo">ostalo</option>
        </select>
	<p>Opis proizvoda:<input type="text" name="opis" class="input text" required></p>
	<p>Vegetarjanski:<input type="radio" name="vege" value=1 required="">DA
					<input type="radio" name="vege" value=0>NE</p>
	<p>Halal:<input type="radio" name="halal" value=1>DA
					<input type="radio" name="halal" value=0 required="">NE</p>
	<p>Košer:<input type="radio" name="koser" value=1>DA
					<input type="radio" name="koser" value=0 required="">NE</p>
    <p>Alergeni:<br/>
        <input type="checkbox" name="alergeni[]" value="soja">Soja
        <input type="checkbox" name="alergeni[]" value="jaja">Jaja
        <input type="checkbox" name="alergeni[]" value="kikiriki">Kikiriki
        <input type="checkbox" name="alergeni[]" value="rakovi">Rakovi
        <input type="checkbox" name="alergeni[]" value="mlijeko">Mlijeko <br/>
        <input type="checkbox" name="alergeni[]" value="školjke">Školjke
        <input type="checkbox" name="alergeni[]" value="orašasti plodovi">Orašasti plodovi
        <input type="checkbox" name="alergeni[]" value="jagode">Jagode
        <input type="checkbox" name="alergeni[]" value="kivi">Kivi
        <input type="checkbox" name="alergeni[]" value="ananas">Ananas
    </p>
	<p>Cijena:<input type="number" name="cijena" required></p>
        <br/><input type="submit" value="Popuni">
	</form>
	
	</article>
	
	<div class="push"></div>
 	<div style="clear:both;"></div>
	
	<footer>
	<p>Copyright , ZKD , 2015</p>
	</footer>
	
</body>
</html>
<?php
/**
 * Created by PhpStorm.
 * User: Marko
 * Date: 21.4.2015.
 * Time: 23:38
 */
session_start();
echo "<ul>";
echo "<li><a href=\"login.html\">Login</a></li>
      <li><a href=\"login.php\">Početna</a></li>
       <li><a href=\"novi_proizvod.php\">Novi Proizvod</a></li>
       <li><a href=\"popis.php\">Popis Proizvoda</a></li>";
echo  "</ul>";

echo"<div class='logout-div'>
    <label>Ulogirani ste kao: ".$_SESSION['korisnik']."</label>
    <button onclick='izlaz()'>Odjavi se</button>";
echo "</div>";
?>

<script>
    function izlaz()
    {
        window.location = "odjava.php";
    }
</script>
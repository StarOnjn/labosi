<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link href="master.css" type="text/css" rel="stylesheet">

    <?php
    session_start();
    ?>
</head>
<body>
<?php
echo "<header>";
include 'meni.php';
echo "</header>";
include 'provjera_login.php';
?>
	<aside>
 <div id="osobni" onclick="sakrij_osobni()"><span class="naslov">Osobni podaci</span><br/>
    <p id="prvo" style="display: block">
        Ime i prezime: Marko Ljubešić<br/>
        E-mail adresa: marko_ljubesic@net.hr<br/>
        Adresa: Bešići 42, 10000 Zagreb<br/>
        Mobitel: 0917628823<br/>
        Godina rođenja: 10.09.1988.<br/>
    </p>
 </div>
        <script>
            function sakrij_osobni(){
                var p=document.getElementById("prvo");
                //kraci if upit ako je prvo=block onda prvo=none, a ako nije onda prvo=block
                p.style.display == "block" ? p.style.display = "none" :
                    p.style.display = "block";
            }
        </script>
 <div id="skolovanje" onclick="sakrij_skolu()"><span class="naslov">Školovanje</span><br/>
    <p id="drugo" style="visibility: visible">
       Početak: 10.2010. Tehničko veleučilište u Zagrebu, Zagreb<br/>
       Smjer: Računarstvo - Inženjerstvo računalnih sustava i mreža<br/>
       09.2003. - 07.2007. Tehnička škola Ruđera Boškovića, Zagreb<br/>
    </p>
 </div>
        <script>
            function sakrij_skolu(){
                var p=document.getElementById("drugo");
                p.style.visibility == "visible" ? p.style.visibility = "hidden" :
                    p.style.visibility = "visible";
            }
        </script>
<div id="iskustvo"><span class="naslov">Radno iskustvo</span><br/>
    <p>
        04.2012. - 05.2012. Epad d.o.o., Zagreb<br/>
        Rad preko interneta od kuće na mjesec dana<br/>
        02.2009. - 05.2009. T-com, Zagreb<br/>
        Telefonske informacije 988<br/>
    </p>
</div>
<div id="znanje"><span class="naslov">Znanje i vještine</span><br/>
    <p>
        Tehničke sposobnosti Programiranje<br/>
        Poznavanje osnova u : C, C++, Javi, C#, SQL, HTML, CSS, PHP<br/>
        Vozačke dozvole Vozačka dozvola, B kategorije<br/>
    </p>
</div>

	</aside>
	
	<article>

        <!--
        <div id="reklama-div">
    <p>reklama:</p>
<a>ovo bi sada kao trebala biti reklama</a>
            <button onclick="sakrij_reklamu()">Ugasi reklamu</button>

        <script>
            function sakrij_reklamu(){
                var reklama=window.document.getElementById("reklama-div");
                reklama.style.zIndex=-7;
            }
        </script>
        </div>
        -->
	</article>
	
	<div class="push"></div>
 	<div style="clear:both;"></div>
	
	<footer>
	<p>Copyright , ZKD , 2015</p>
	</footer>
</body>
</html> 
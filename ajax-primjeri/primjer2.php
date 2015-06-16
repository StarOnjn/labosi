<?php
/**
 * Primjer upita AJAX-om koristeći GET
 *
 */

// popis podataka
$popis=array( "Stipe", "Marko", "Ivan", "Ivana", "Josip", "Tomislav", "Tonka", "Stjepan", "Marija");


// filtriraj ulaz
$upit=filter_input(INPUT_GET, "upit", FILTER_SANITIZE_STRING);

// inicijaliziraj ispis
$ispis="<table>";

//prođi kroz sve podatke i ispiši što treba
foreach($popis as $element){

    if(stripos($element,$upit)!== false){
        $ispis.="<tr><td>$element</td></tr>";
    }
}
$ispis.="</table>";

echo $ispis;


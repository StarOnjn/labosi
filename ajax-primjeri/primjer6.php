<?php
/**
 * Primjer upita AJAX-om koristeći GET
 *
 */

session_start();

if ($_SESSION['ime']!='Ivan') {
    echo json_encode(array('ERROR'=> 'Nisi ulogiran!'));
}
else {
    // popis podataka
    $popis=array( "Stipe", "Marko", "Ivan", "Ivana", "Josip", "Tomislav", "Tonka", "Stjepan", "Marija");


    // filtriraj ulaz
    $upit=filter_input(INPUT_GET, "upit", FILTER_SANITIZE_STRING);

    // inicijalizacija praznog polja
    $ispis=[];

    //prođi kroz sve podatke i ispiši što treba
    foreach($popis as $element){

        if(stripos($element,$upit)!== false){
            $ispis[]=$element;
        }
    }

    echo json_encode(array("PODACI"=>$ispis));
}

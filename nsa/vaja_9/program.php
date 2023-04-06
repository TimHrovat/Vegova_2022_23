<?php
    require_once('data.php'); 
    require_once('funkcije.php'); 

    $t = napolniT($vozila);
    $lastnik = array();

    echo '<pre>';
    print_r($t);
    echo '</pre>';

    for ($i = 0; $i < 5; $i++) {
        $stanje = nakup($oseba[rand(0,count($oseba)-1)], $vozila[rand(0,count($vozila)-1)][0]);

        $message = $stanje ? "Nakup izveden" : "Nakup ni izveden";
        echo $message;

        echo '<pre>';
        print_r($t);
        echo '</pre>';

        echo '<pre>';
        print_r($lastnik);
        echo '</pre>';
    }

    echo '<pre>';
    print_r($lastnik);
    echo '</pre>';

    for ($i = 0; $i < 5; $i++) {
        $stanje = prodaja($oseba[rand(0,count($oseba)-1)], $vozila[rand(0,count($vozila)-1)][0]);

        $message = $stanje ? "Prodaja izvedena" : "Prodaja ni izvedena";
        echo $message;

        echo '<pre>';
        print_r($t);
        echo '</pre>';

        echo '<pre>';
        print_r($lastnik);
        echo '</pre>';
    }

    print_r(izpisLastnikov("Jaguar"));


    $stanje = prodajaVseh($oseba[rand(0,count($oseba)-1)]);
    $message = $stanje ? "Prodaja vseh izvedena" : "Ni osebe";
    echo $message;

    echo '<pre>';
    print_r($t);
    echo '</pre>';

    echo '<pre>';
    print_r($lastnik);
    echo '</pre>';

    $stanje = prodajaVseh("pikapolonica");
    $message = $stanje ? "Prodaja vseh izvedena" : "Ni osebe";
    echo $message;

    echo '<pre>';
    print_r($t);
    echo '</pre>';

    echo '<pre>';
    print_r($lastnik);
    echo '</pre>';

    prikazKoličin();
?>
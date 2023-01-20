<?php

/* 
vous ajouterez ici les fonctions qui vous sont utiles dans le site,
je vous ai créé la première qui est pour le moment incomplète et qui devra contenir
la logique pour choisir la page à charger
*/

function getContent() {
	if(!isset($_GET['page'])){
		include __DIR__.'/../pages/home.php';
	}
	elseif(isset($_GET['page']) && $_GET['page'] == "bio") {

        include __DIR__.'/../pages/bio.php';
    }
	elseif(isset($_GET['page']) && $_GET['page'] == "contact") {

        include __DIR__.'/../pages/contact.php';
    }
    else {
        echo "La page demander n'existe pas";
    }
}

function getPart($name) {
	include __DIR__ . '/../parts/'. $name . '.php';
}

function getUserDate() {
    $fiche = file_get_contents('../data/user.json');
    $fichier = json_decode($fiche);

    foreach ($fichier as $document) {
        if (is_array($document)){
            foreach ($document as $value){
                foreach ($value as $critere) {
                    echo "<br>" . $critere ;
                }
            }
        }else{
            echo $document . " ";
        }
    }
}
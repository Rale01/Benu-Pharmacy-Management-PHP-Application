<?php

require "../../dbBroker.php";
require "../../model/apoteka.php";

if( isset($_POST['id']) &&
    isset($_POST['naziv']) &&
    isset($_POST['farmaceut_id']) &&
    isset($_POST['korisnik_id']) &&
    isset($_POST['opstina'])){

    $apoteka = new Apoteka($_POST['id'],$_POST['naziv'],$_POST['farmaceut_id'],
        $_POST['korisnik_id'],$_POST['opstina']);

    $status = $apoteka->update($konekcija);

    if($status){
        echo"Uspesno";
    }else{
        echo $status;
        echo "Neuspesno";
    }

}

?>
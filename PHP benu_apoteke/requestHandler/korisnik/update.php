<?php

require "../../dbBroker.php";
require "../../model/Korisnik.php";

if( isset($_POST['id']) &&
    isset($_POST['ime']) &&
    isset($_POST['prezime']) &&
    isset($_POST['datumrodjenja']) &&
    isset($_POST['pol']) &&
    isset($_POST['username']) &&
    isset($_POST['password'])){

    $korisnik = new Korisnik($_POST['id'],$_POST['ime'],$_POST['prezime'],
                             $_POST['datumrodjenja'],$_POST['pol'],
                             $_POST['username'],$_POST['password']);

    $status = $korisnik->update($konekcija);

    if($status){
        echo"Uspesno";
    }else{
        echo $status;
        echo "Neuspesno";
    }

}

?>
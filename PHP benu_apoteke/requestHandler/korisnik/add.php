<?php

require "../../dbBroker.php";
require "../../model/Korisnik.php";

if(isset($_POST['ime']) &&
    isset($_POST['prezime']) &&
    isset($_POST['datumrodjenja']) &&
    isset($_POST['pol']) &&
    isset($_POST['username'])&&
    isset($_POST['password'])){

    $korisnik = new Korisnik(null,$_POST['ime'],$_POST['prezime'],
        $_POST['datumrodjenja'],$_POST['pol'],
        $_POST['username'],$_POST['password']);

    $status = $korisnik->add($konekcija);

    if($status){
        echo"Uspesno";
    }else{
        echo "Neuspesno";
    }

}


?>
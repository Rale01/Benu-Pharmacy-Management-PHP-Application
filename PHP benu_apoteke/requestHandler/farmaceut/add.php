<?php

require "../../dbBroker.php";
require "../../model/farmaceut.php";

if(isset($_POST['ime']) &&
    isset($_POST['prezime']) &&
    isset($_POST['strucnaSprema'])){

    $farmaceut = new Farmaceut(null,$_POST['ime'],$_POST['prezime'],
        $_POST['strucnaSprema']);

    $status = $farmaceut->add($konekcija);

    if($status){
        echo"Uspesno";
    }else{
        echo "Neuspesno";
    }

}


?>
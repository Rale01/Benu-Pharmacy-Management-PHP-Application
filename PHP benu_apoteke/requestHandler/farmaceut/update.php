<?php

require "../../dbBroker.php";
require "../../model/farmaceut.php";

if( isset($_POST['id']) &&
    isset($_POST['ime']) &&
    isset($_POST['prezime']) &&
    isset($_POST['strucnaSprema'])){
    $farmaceut = new Farmaceut($_POST['id'],$_POST['ime'],$_POST['prezime'],
        $_POST['strucnaSprema']);

    $status = $farmaceut->update($konekcija);

    if($status){
        echo"Uspesno";
    }else{
        echo $status;
        echo "Neuspesno";
    }

}

?>
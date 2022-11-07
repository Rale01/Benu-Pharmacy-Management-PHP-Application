<?php

require "../../dbBroker.php";
require "../../model/Korisnik.php";

if(isset($_POST['id'])){

    $korisnik = new Korisnik($_POST['id']);

    $status = $korisnik->delete($konekcija);

    if($status){
        echo"Uspesno";
    }else{
        echo $status;
        echo "Neuspesno";
    }

}

?>
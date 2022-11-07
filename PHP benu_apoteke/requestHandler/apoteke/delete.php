<?php

require "../../dbBroker.php";
require "../../model/apoteka.php";

if(isset($_POST['id'])){

    $apoteka = new Apoteka($_POST['id']);

    $status = $apoteka->delete($konekcija);

    if($status){
        echo"Uspesno";
    }else{
        echo $status;
        echo "Neuspesno";
    }

}

?>
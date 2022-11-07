<?php

require "../../dbBroker.php";
require "../../model/farmaceut.php";

if(isset($_POST['id'])){

    $farmaceut = new Farmaceut($_POST['id']);

    $status = $farmaceut->delete($konekcija);

    if($status){
        echo"Uspesno";
    }else{
        echo $status;
        echo "Neuspesno";
    }

}

?>
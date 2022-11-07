<?php

require "../../dbBroker.php";
require "../../model/Korisnik.php";

if(isset($_POST['username'])){

    $obj = Korisnik::getKorisnik($_POST['username'],$konekcija);

    echo json_encode($obj);

}

?>
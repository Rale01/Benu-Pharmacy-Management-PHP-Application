<?php

require "../../dbBroker.php";
require "../../model/apoteka.php";

if(isset($_POST['id'])){

    $obj = Apoteka::getApoteka($_POST['id'],$konekcija);

    echo json_encode($obj);

}

?>
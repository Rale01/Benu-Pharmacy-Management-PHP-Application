<?php

require "../../dbBroker.php";
require "../../model/farmaceut.php";

if(isset($_POST['id'])){

    $obj = Farmaceut::getFarmaceut($_POST['id'],$konekcija);

    echo json_encode($obj);

}

?>
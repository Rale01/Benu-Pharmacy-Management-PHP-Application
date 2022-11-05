<?php

     $user = 'root';
     $password = '';
     $server = 'localhost';
     $database = 'benu';


    $konekcija = new mysqli($server,$user,$password,$database);

    if($konekcija->connect_errno){
        exit('Neuspelo povezivanje sa bazom, greska: '. $konekcija->connect_error);
    }

?>
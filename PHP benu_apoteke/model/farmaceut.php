<?php

class Farmaceut
{

    private $id;
    private $ime;
    private $prezime;
    private $strucnaSprema;
   


    public function __construct($id=null, $ime=null, $prezime=null, $strucnaSprema=null)
    {
        $this->id = $id;
        $this->ime = $ime;
        $this->prezime = $prezime;
        $this->strucnaSprema = $strucnaSprema;
        
    }

    public function add(mysqli $conn){
        $upit = "INSERT INTO farmaceuti (ime,prezime,strucnaSprema) 
                 VALUES ('$this->ime','$this->prezime','$this->strucnaSprema');";
        return $conn->query($upit);
    }

    public function update(mysqli $conn){
        $upit = "UPDATE farmaceuti set ime = '$this->ime',prezime = '$this->prezime',
                $strucnaSprema = '$this->strucnaSprema'  WHERE id='$this->id'";
        return $conn->query($upit);
    }

    public function delete(mysqli $conn){
        $upit = "DELETE FROM farmaceuti WHERE id='$this->id'";
        return $conn->query($upit);
    }

    public static function getAll(mysqli $conn)
    {
        $upit = "SELECT * FROM farmaceuti";
        return $conn->query($upit);
    }


    public static function getFarmaceut($id, mysqli $conn){
        $upit = "SELECT * FROM farmaceuti WHERE id='$id'";

        $farmaceut = array();
        if($obj = $conn->query($upit)){
            while($red = $obj->fetch_array(1)){
                $farmaceut[]= $red;
            }
        }

        return $farmaceut;
    }


}
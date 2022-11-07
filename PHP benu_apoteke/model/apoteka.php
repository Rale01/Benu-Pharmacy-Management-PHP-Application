<?php

class Apoteka
{
    private $id;
    private $naziv;
    private $farmaceut_id;
    private $korisnik_id;
    private $opstina;


    public function __construct($id=null, $naziv=null, $farmaceut_id=null, $korisnik_id=null, $opstina=null)
    {
        $this->id = $id;
        $this->naziv = $naziv;
        $this->farmaceut_id = $farmaceut_id;
        $this->korisnik_id = $korisnik_id;
        $this->opstina = $opstina;
    }


    public function add(mysqli $conn){
        $upit = "INSERT INTO apoteke (naziv,farmaceut_id,korisnik_id,opstina) 
                 VALUES ('$this->naziv','$this->farmaceut_id','$this->korisnik_id','$this->opstina');";
        return $conn->query($upit);
    }

    public function update(mysqli $conn){
        $upit = "UPDATE apoteke set naziv = '$this->naziv',farmaceut_id = '$this->farmaceut_id',
                   korisnik_id = '$this->korisnik_id',opstina = '$this->opstina'  WHERE id=$this->id";
        return $conn->query($upit);
    }

    public function delete(mysqli $conn){
        $upit = "DELETE FROM apoteke WHERE id='$this->id'";
        return $conn->query($upit);
    }

    public static function getAll(mysqli $conn)
    {
        $upit = "SELECT * FROM apoteke";
        return $conn->query($upit);
    }


    public static function getApoteka($id, mysqli $conn){
        $upit = "SELECT * FROM apoteke WHERE id='$id'";

        $apoteka = array();
        if($obj = $conn->query($upit)){
            while($red = $obj->fetch_array(1)){
                $apoteka[]= $red;
            }
        }

        return $apoteka;
    }
}
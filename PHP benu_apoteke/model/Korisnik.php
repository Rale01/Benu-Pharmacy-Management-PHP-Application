<?php

class Korisnik
{

    public $id;
    public $ime;
    public $prezime;
    public $datumRodjenja;
    public $pol;
    public $username;
    public $password;

    public function __construct($id=null,$ime=null, $prezime=null, $datumRodjenja=null, $pol=null, $username=null, $password=null)
    {   $this->id=$id;
        $this->ime = $ime;
        $this->prezime = $prezime;
        $this->datumRodjenja = $datumRodjenja;
        $this->pol = $pol;
        $this->username = $username;
        $this->password = $password;
    }


    public function add(mysqli $conn){
        $upit = "INSERT INTO korisnici (ime,prezime,datumRodjenja,pol,username,password) 
                 VALUES ('$this->ime','$this->prezime','$this->datumRodjenja','$this->pol','$this->username','$this->password');";
        return $conn->query($upit);
    }

    public function update(mysqli $conn){
        $upit = "UPDATE korisnici set ime = '$this->ime',prezime = '$this->prezime',
                   datumRodjenja = '$this->datumRodjenja',pol = '$this->pol', username='$this->username',
                   password='$this->password'   WHERE id=$this->id";
        return $conn->query($upit);
    }

    public function delete(mysqli $conn){
        $upit = "DELETE FROM korisnici WHERE id='$this->id'";
        return $conn->query($upit);
    }

    public static function getAll(mysqli $conn)
    {
        $upit = "SELECT * FROM korisnici";
        return $conn->query($upit);
    }


    public static function getKorisnik($id, mysqli $conn){
        $upit = "SELECT * FROM korisnici WHERE id='$id'";

        $korisnik = array();
        if($obj = $conn->query($upit)){
            while($red = $obj->fetch_array(1)){
                $korisnik[]= $red;
            }
        }

        return $korisnik;
    }
    public static function getKorisnikUsername($username, mysqli $conn){
        $upit = "SELECT * FROM korisnici WHERE username='$username'";

        $korisnik = array();
        if($obj = $conn->query($upit)){
            while($red = $obj->fetch_array(1)){
                $korisnik[]= $red;
            }
        }

        return $korisnik;
    }


}
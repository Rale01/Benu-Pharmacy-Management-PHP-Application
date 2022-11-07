<?php

class Prijava
{
    public static function prijaviSe(mysqli $conn,$username,$password){
        return $conn->query("SELECT username FROM korisnici WHERE username='$username' AND password='$password'");
    }
}
<?php

class User
{
    protected $id_person, $username, $password, $name, $surname;
    protected $date, $city, $region, $registration_sequence, $has_registered, $email;
    protected $friends, $favorites;
    
    function __construct($id_person, $username, $password, $name, $surname, $date, 
                    $city, $region, $registration_sequence, $has_registered, $email)
    {
        $this->id_person = $id_person;
        $this->username = $username;
        $this->name = $name;
        $this->surname = $surname;
        $this->date = $date;
        $this->city = $city;
        $this->region = $region;
        $this->registration_sequence = $registration_sequence;
        $this->has_registered = $has_registered;
        $this->email = $email;
        $this->friends = []; 
        $this->favorites = [];
    }

    function __get( $prop ){ return $this->$prop; }
    function __set( $prop, $val ){ $this->$prop = $val; return $this;}
}

?>
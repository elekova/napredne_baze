<?php

class Person
{
    protected $id_person, $username, $password, $name, $surname;
    protected $date, $city, $region, $registration_sequence, $has_registered, $email;
    
    function __construct($id_person, $username, $password, $name, $surname, $date, 
                    $city, $region, $registration_sequence, $has_registered, $email, $friends, $favorites)
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
    }

    function __get( $prop ){ return $this->$prop; }
    function __set( $prop, $val ){ $this->$prop = $val; return $this;}
    function getIdPerson(){ return $this->id_person; }
    function getName(){ return $this->name; }
    function getSurname(){ return $this->surname; }
    function getDate(){ return $this->date; }
    function getCity(){ return $this->city; }
    function getEmail(){ return $this->email; }

}

?>

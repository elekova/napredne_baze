<?php

class Person
{
    protected $id_person, $username, $password, $name, $surname;
    protected $date, $city, $region, $registration_sequence, $has_registered, $email;
    
    function __construct($id_person, $username, $password, $name, $surname, $email, 
                    $gender, $date, $city, $region)
    {
        $this->id_person = $id_person;
        $this->username = $username;
        $this->name = $name;
        $this->surname = $surname;
        $this->date_of_birth = $date;
        $this->city = $city;
        $this->region = $region;
        $this->email = $email;
        $this->gender = $gender;
        $this->password = $password;

    }

    function __get( $prop ){ return $this->$prop; }
    function __set( $prop, $val ){ $this->$prop = $val; return $this;}

}

?>

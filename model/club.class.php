<?php

class Club
{
    protected $id_club, $name, $city, $country, $id_sport;

    function __construct($id_club, $name, $city, $country, $id_sport)
    {
        $this->id_club = $id_club;
        $this->name = $name;
        $this->city = $city;
        $this->country = $country;
        $this->id_sport = $id_sport;
    }

    function __get( $prop ){ return $this->$prop; }
    function __set( $prop, $val ){ $this->$prop = $val; return $this;}
}

?>

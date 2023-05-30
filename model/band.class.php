<?php

class Club
{
    protected $id_band, $name, $country, $genre;
    
    function __construct($id_band, $name, $country, $genre)
    {
        $this->id_band = $id_band;
        $this->name = $name;
        $this->country = $country;
        $this->genre = $genre;
    }

    function __get( $prop ){ return $this->$prop; }
    function __set( $prop, $val ){ $this->$prop = $val; return $this;}
}

?>
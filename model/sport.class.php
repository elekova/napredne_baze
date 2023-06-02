<?php

class Sport
{
    protected $id_sport, $type;
    
    function __construct($id_sport, $type)
    {
        $this->id_sport = $id_sport;
        $this->type = $type;
    }

    function __get( $prop ){ return $this->$prop; }
    function __set( $prop, $val ){ $this->$prop = $val; return $this;}
}

?>
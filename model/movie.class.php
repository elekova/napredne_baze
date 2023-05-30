<?php

class Movie
{
    protected $id_movie, $title, $director, $year, $genre;
    
    function __construct($id_movie, $title, $director, $year, $genre)
    {
        $this->id_movie = $id_movie;
        $this->title = $title;
        $this->director = $director;
        $this->year = $year;
        $this->genre = $genre;
    }

    function __get( $prop ){ return $this->$prop; }
    function __set( $prop, $val ){ $this->$prop = $val; return $this;} 
}

?>
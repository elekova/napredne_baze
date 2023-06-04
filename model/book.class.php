<?php

class Book
{
    protected $id_book, $title, $author, $year;
    
    function __construct($id_book, $title, $author, $year)
    {
        $this->id_book = $id_book;
        $this->title = $title;
        $this->author = $author;
        $this->year = $year;
    }

    function __get( $prop ){ return $this->$prop; }
    function __set( $prop, $val ){ $this->$prop = $val; return $this;} 
}

?>
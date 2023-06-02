<?php

require_once __DIR__ . '/../app/database/db.class.php';
require_once __DIR__ . '/user.class.php';
require_once __DIR__ . '/database.class.php';

class Service
{
    function getUser( $userId )
    {
        //spajanje na mysqlbazu i dohvacanje podataka
        //spajanje na neo4j i dohvacanje podataka
    }

    function addFriend(User $friend)
    {
        $this->friends[] = $friend;
    }

    function removeFriend(User $friend)
    {
        $index = array_search($friend, $this->friends);
        if ($index !== false) {
            array_splice($this->friends, $index, 1);
        }
    }

    function addFavorite(User $favorite)
    {
        $this->favorites[] = $favorite;
    }

    function removeFavorite(User $favorite)
    {
        $index = array_search($favorite, $this->favorites);
        if ($index !== false) {
            array_splice($this->favorites, $index, 1);
        }
    }

    //dohvati moje prijatelje
    //dohvati moje favorite
    //moji filmovi, sportovi i svi interesi

}

?>
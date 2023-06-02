<?php

class PersonController extends BaseController
{
    function index()
    {
     
    }

    function getUser( $username )
    {

    }

    function addFriendAction($userId, $friendId)
    {
        //dohvacanje usera
        $user = getUser( $userId );
        $friend = getUser( $friendId );

        //stavaranje veza
        $user->addFriend($friend);
        $friend->addFriend($user);

        //spremiti u bazu

        //neka obavijest da je storeno prijteljstvo
    }

    function removeFriendAction($userId, $friendId)
    {
        $user = getUser( $userId );
        $friend = getUser( $friendId );

        //uklanjanje veze
        $user->removeFriend($friend);
        $friend->removeFriend($user);

        //spremiti ubazu

        //neka obavijest
    }

    // Ostale akcije vezane uz upravljanje vezama
}

?>
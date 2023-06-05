<?php

class PersonController extends BaseController
{
    function index()
    {
        //prikazuje podatke o useru
        $user = $_SESSION['username'];
        $service = new Service();
        $this->registry->template->title = 'My profile';
        $this->registry->template->userList = $ls->getAllUsers();
        
        $this->registry->template->show( 'person_index' );

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

        //spremiti u bazu

        //neka obavijest
    }

    // Ostale akcije vezane uz upravljanje vezama


    
}


?>
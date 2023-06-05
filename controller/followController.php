<?php

require_once __DIR__ . '/../model/service.class.php';

class FollowController
 {
    function index()
    {
        header( 'Location: index.php?rt=mycrew' );
    }

    function following()
    {
		if(!isset($_SESSION['username'])){
			header( 'Location: index.php?rt=login' );
		}
		$title = "Following!";
        $currentUser = $_SESSION['username'];

		$service= new Service();
		$person = $service->getPersonByUsername($_SESSION['username']);

        $id_ = $person['id_person'];
        $id = strval($id_);
        $usersList = [];
        $following = $service->getFollowing($id);
        
        foreach ($following as $user) {
            $user = $service->getPersonById($user);
            $usersList[$user['id_person']] = $user;
        }
        
		require_once __DIR__ . '/../view/following_index.php';
	}

    function followers()
    {
        if(!isset($_SESSION['username'])){
			header( 'Location: index.php?rt=login' );
		}
		$title = "Followers!";
        $currentUser = $_SESSION['username'];

		$service= new Service();
		$person = $service->getPersonByUsername($_SESSION['username']);

        $id = $person['id_person'];
        $usersList[] = array();
        $following = $service->getFollowed($_SESSION['username']);

        foreach($following as $temp){
            $usersList[] = $service->getPersonById($temp);
        }
        
		require_once __DIR__ . '/../view/following_index.php';
    }
 }

?>
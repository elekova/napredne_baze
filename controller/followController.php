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

        $id_ = $person['id_person'];
        $id = strval($id_);
        $usersList = [];
        $followed_users = [];
        $followers = $service->getFollowers( $id );

        foreach ($followers as $user) {
            $user = $service->getPersonById( $user );
            $usersList[ $user['id_person'] ] = $user;
            $followsCurrentUser = $service->doIFollowUser($currentUser, $user['username']);

            if ($followsCurrentUser) {
                $followed_users[$user['id_person']] = true; // Prati korisnika
            } else {
                $followed_users[$user['id_person']] = false; // Ne prati korisnika
            }
        }

		require_once __DIR__ . '/../view/followers_index.php';
    }
    
    function unfollow()
    {
        if(!isset($_SESSION['username'])){
			header( 'Location: index.php?rt=login' );
        }
        if( isset($_POST['unfollow'])){
            $service= new Service();
            $id_unfollowed = $_POST['unfollow'];
    
            $service->removeFollow( $_SESSION['username'], $id_unfollowed );
        }
        $this->following();
    }

    function follow()
    {
        if(!isset($_SESSION['username'])){
			header( 'Location: index.php?rt=login' );
        }
        if( isset($_POST['follow'])){
            $service= new Service();
            $id_followed = $_POST['follow'];
    
            $service->addFollow( $_SESSION['username'], $id_followed );
        }
        $this->following();
    }
 }

?>

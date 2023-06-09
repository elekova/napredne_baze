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
        $following = $service->getFollowing( $id );

        foreach ($followers as $user_) {
            $user = $service->getPersonById( $user_ );
            $usersList[ $user['id_person'] ] = $user;

            if( !empty($following)){
                foreach($following as $fol){
                    if( $user_ == $fol ){
                        $followed_users[$user_] = true;
                        break;
                    } else {
                        $followed_users[$user_] = false;
                    }
                }
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

<?php
	require_once __DIR__ . '/../model/service.class.php';

	class LoginController{
		function index(){
			$title = "Stranica za login";
			if(isset($_SESSION['username'])){
				//echo 'Ovo je prelose';
				header('Location: index.php?rt=mycrew');
				return;
			}
			require_once __DIR__ . '/../view/login_index.php';
		}

		function loginCheck(){

			if(isset($_SESSION['id_user'])){
				//echo 'Ovo je prelose';
				header('Location: index.php?rt=mycrew');
				return;
			}
			if(!isset($_POST["username"]) || preg_match('/[a-zA-Z1-9]{1, 20}/', $_POST["username"])){
				//echo 'Neispravni login.';
				//$mess = 'Neispravni login';

				header('Location: index.php?rt=login&mess=Wrong login format.');
				return;
			}

			if(!isset($_POST["password"]) || strlen($_POST["password"]) < 1){
				//echo 'Neispravni login.';
				//$mess = 'Neispravni login';

				header('Location: index.php?rt=login&mess=Password is required!');
				return;
			}

			$s = new Service();
			$us_id = $s -> checkUser($_POST['username'], $_POST['password']);
			$reg_status = 1;
			//if($us_id != 0){
			//	$reg_status = $s -> getUserRegStatus($us_id);
			//}
			if($us_id == 0){
				$mess = 'Wrong combination of username-password!';

				header('Location: index.php?rt=login&mess=' . $mess);
			}/*else if($reg_status == 0){
				$mess = 'User is registered but verification is needed.';
				header('Location: index.php?rt=login&mess=' . $mess);
			}*/else{
				//echo 'Uspjesan login';
				$_SESSION['username'] = $us_id;
				header('Location: index.php?rt=mycrew');
			}

		}

		function out(){
			if(!isset($_SESSION['username'])){

				header('Location: index.php?rt=login');
				return;
			}
			session_unset();
			session_destroy();

			header('Location: index.php?rt=login');
		}


	}




?>

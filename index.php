
<?php



	if(!isset($_SESSION['username'])){
    	session_start();

    }

  // Provjeri je li postavljena varijabla rt; kopiraj ju u $route
  if(isset( $_GET['rt'])){
    $route = $_GET['rt'];
  }
  else{

    $route = 'login';
  }


$parts = explode( '/', $route );

$controllerName = $parts[0] . 'Controller';
if( isset( $parts[1] ) )
	$action = $parts[1];
else
	$action = 'index';



// Controller $controllerName se nalazi poddirektoriju controller
$controllerFileName = 'controller/' . $controllerName . '.php';


// Includeaj tu datoteku
require_once $controllerFileName;

// Stvori pripadni kontroler
$con = new $controllerName;

// Pozovi odgovarajuću akciju
$con->$action();

?>

<?php

require_once __SITE_PATH . '/app/' . 'controller_base.class.php';

require_once __SITE_PATH . '/app/' . 'registry.class.php';

require_once __SITE_PATH . '/app/' . 'router.class.php';

require_once __SITE_PATH . '/app/' . 'template.class.php';

require_once __SITE_PATH . '/app/database/' . 'db.class.php';


// Automatsko učitavanja klasa iz modela kad se pozove new.
spl_autoload_register( function( $class_name ) 
{
	// Imena datoteke od klasa će biti napisana malim slovima.
	// Npr. za klasu User će biti spremljeno u user.class.php
	$filename = strtolower($class_name) . '.class.php';
	$file = __SITE_PATH . '/model/' . $filename;

	if( file_exists($file) === false )
	    return false;

	require_once ($file);
} );

?>

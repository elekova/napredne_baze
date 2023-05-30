<?php

require_once __DIR__ . '/db.settings.php';

class DB
{
	private static $db = null;

	private function __construct() { }
	private function __clone() { }

	public static function getConnection() 
	{
		if( DB::$db === null )
	    {
            global $db_base, $db_user, $db_pass;
	    	try
	    	{
		    	DB::$db = new PDO( $db_base, $db_user, $db_pass );
		    	DB::$db-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    }
		    catch( PDOException $e ) { exit( 'PDO Error: ' . $e->getMessage() ); }
	    }
		return DB::$db;
	}
}

?>
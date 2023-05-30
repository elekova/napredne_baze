<?php

// Manualno inicijaliziramo bazu ako veÄ‡ nije.
require_once 'db.class.php';

$db = DB::getConnection();

$has_tables = false;

try
{
	$st = $db->prepare(
		'SHOW TABLES LIKE :tblname'
	);

	$st->execute( array( 'tblname' => 'person' ) );
	if( $st->rowCount() > 0 )
		$has_tables = true;

	$st->execute( array( 'tblname' => 'book' ) );
	if( $st->rowCount() > 0 )
		$has_tables = true;

	$st->execute( array( 'tblname' => 'movie' ) );
	if( $st->rowCount() > 0 )
		$has_tables = true;

	$st->execute( array( 'tblname' => 'sport' ) );
	if( $st->rowCount() > 0 )
		$has_tables = true;

	$st->execute( array( 'tblname' => 'club' ) );
	if( $st->rowCount() > 0 )
		$has_tables = true;

    $st->execute( array( 'tblname' => 'band' ) );
    if( $st->rowCount() > 0 )
    	$has_tables = true;



}
catch( PDOException $e ) { exit( "PDO error [show tables]: " . $e->getMessage() ); }


if( $has_tables )
{
	exit( 'Tablice person / book / movie / sport / club / band već postoje. Obrišite ih pa probajte ponovno.' );
}


try
{
	$st = $db->prepare(
		'CREATE TABLE IF NOT EXISTS person (' .
		'id_person int NOT NULL PRIMARY KEY AUTO_INCREMENT,' .
		'username varchar(50) NOT NULL,' .
        'password varchar(255) NOT NULL,'.
		'name varchar(50) NOT NULL,' .
		'surname varchar(50) NOT NULL,' .
		'date_of_birth date, '.
        'city varchar(50),'.
        'region varchar(50),'.
		'registration_sequence varchar(20),' .
		'has_registered int,'.
        'email varchar(50))'
	);

	$st->execute();
}
catch( PDOException $e ) { exit( "PDO error [create person]: " . $e->getMessage() ); }

echo "Napravio tablicu person.<br />";

try
{
	$st = $db->prepare(
		'CREATE TABLE IF NOT EXISTS movie (' .
		'id_movie int NOT NULL PRIMARY KEY AUTO_INCREMENT,' .
		'title varchar(50) NOT NULL,' .
        'director varchar(50) ,' .
        'year int ,' .
		'genre varchar(50) )'
	);

	$st->execute();
}
catch( PDOException $e ) { exit( "PDO error [create movie]: " . $e->getMessage() ); }

echo "Napravio tablicu movie.<br />";

try
{
	$st = $db->prepare(
		'CREATE TABLE IF NOT EXISTS book (' .
		'id_book int NOT NULL PRIMARY KEY AUTO_INCREMENT,' .
		'title varchar(50) NOT NULL,' .
        'author varchar(50) ,' .
        'year int)'
	);

	$st->execute();
}
catch( PDOException $e ) { exit( "PDO error [create book]: " . $e->getMessage() ); }

echo "Napravio tablicu book.<br />";

try
{
	$st = $db->prepare(
		'CREATE TABLE IF NOT EXISTS sport (' .
		'id_sport int NOT NULL PRIMARY KEY AUTO_INCREMENT,' .
		'type varchar(50) NOT NULL)'
	);

	$st->execute();
}
catch( PDOException $e ) { exit( "PDO error [create sport]: " . $e->getMessage() ); }

echo "Napravio tablicu sport.<br />";

try
{
	$st = $db->prepare(
		'CREATE TABLE IF NOT EXISTS club (' .
		'id_club int NOT NULL PRIMARY KEY AUTO_INCREMENT,' .
		'name varchar(50) NOT NULL,' .
        'city varchar(50) ,' .
        'country varchar(50) ,' .
        'id_sport int FOREIGN KEY REFERENCES sport(id_sport))'
	);

	$st->execute();
}
catch( PDOException $e ) { exit( "PDO error [create club]: " . $e->getMessage() ); }

echo "Napravio tablicu club.<br />";

try
{
	$st = $db->prepare(
		'CREATE TABLE IF NOT EXISTS band (' .
		'id_band int NOT NULL PRIMARY KEY AUTO_INCREMENT,' .
		'name varchar(50) NOT NULL,' .
        'country varchar(50) ,' .
        'genre varchar(50) )'
	);

	$st->execute();
}
catch( PDOException $e ) { exit( "PDO error [create band]: " . $e->getMessage() ); }

echo "Napravio tablicu band.<br />";

try
{
	$st = $db->prepare(
		'CREATE TABLE IF NOT EXISTS like_book (' .
		'id_likebook int NOT NULL PRIMARY KEY AUTO_INCREMENT,' .
        'id_person int FOREIGN KEY REFERENCES person(id_person),'.
        'id_book int FOREIGN KEY REFERENCES book(id_book),'.
        'read int )'
	);

	$st->execute();
}
catch( PDOException $e ) { exit( "PDO error [create like_book]: " . $e->getMessage() ); }

echo "Napravio tablicu like_book.<br />";

try
{
	$st = $db->prepare(
		'CREATE TABLE IF NOT EXISTS like_movie (' .
		'id_likemovie int NOT NULL PRIMARY KEY AUTO_INCREMENT,' .
        'id_person int FOREIGN KEY REFERENCES person(id_person),'.
        'id_movie int FOREIGN KEY REFERENCES movie(id_movie),'.
        'watched int )'
	);

	$st->execute();
}
catch( PDOException $e ) { exit( "PDO error [create like_movie]: " . $e->getMessage() ); }

echo "Napravio tablicu like_movie.<br />";

try
{
	$st = $db->prepare(
		'CREATE TABLE IF NOT EXISTS like_sport (' .
		'id_likesport int NOT NULL PRIMARY KEY AUTO_INCREMENT,' .
        'id_person int FOREIGN KEY REFERENCES person(id_person),'.
        'id_sport int FOREIGN KEY REFERENCES sport(id_sport) )'
	);

	$st->execute();
}
catch( PDOException $e ) { exit( "PDO error [create like_sport]: " . $e->getMessage() ); }

echo "Napravio tablicu like_sport.<br />";

try
{
	$st = $db->prepare(
		'CREATE TABLE IF NOT EXISTS like_club (' .
		'id_likeclub int NOT NULL PRIMARY KEY AUTO_INCREMENT,' .
        'id_person int FOREIGN KEY REFERENCES person(id_person),'.
        'id_club int FOREIGN KEY REFERENCES book(id_club))'
	);

	$st->execute();
}
catch( PDOException $e ) { exit( "PDO error [create like_club]: " . $e->getMessage() ); }

echo "Napravio tablicu like_club.<br />";

try
{
	$st = $db->prepare(
		'CREATE TABLE IF NOT EXISTS like_band (' .
		'id_likeband int NOT NULL PRIMARY KEY AUTO_INCREMENT,' .
        'id_person int FOREIGN KEY REFERENCES person(id_person),'.
        'id_band int FOREIGN KEY REFERENCES band(id_band) )'
	);

	$st->execute();
}
catch( PDOException $e ) { exit( "PDO error [create like_band]: " . $e->getMessage() ); }

echo "Napravio tablicu like_band.<br />";



?>
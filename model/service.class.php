<?php

require_once __DIR__ . '/../app/database/db.class.php';
require_once __DIR__ . '/../vendor/autoload.php';
require_once 'person.class.php';

use Laudis\Neo4j\ClientBuilder;
use Laudis\Neo4j\Authentication\Authenticate;

$url = 'neo4j+s://d9646c66.databases.neo4j.io:7687';
$auth = Authenticate::basic('neo4j', 'gIF97J_pKsT9Nj_Vmm5fMNEI1x1TAUogZut-4j53v5A');
$client = ClientBuilder::create()->withDriver('neo4j', $url, $auth)->build();

class Service
{
	function getPersonById( $id )
	{
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare( 'SELECT * FROM person_nova WHERE id_person=:id' );
			$st->execute( array( 'id' => $id ) );
		}
		catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

		$row = $st->fetch();
		if( $row === false )
			return null;
		else
			return new Person( $row['id_person'], $row['username'], $row['password'], $row['name'], $row['surname'], $row['email'], $row['gender'] );
	}

	function getPersonByName( $username )
	{
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare('SELECT * FROM person_nova WHERE username = :username');
			$st->execute( array( 'username' => $username ) );
		}
		catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

		$row = $st->fetch();
		$param = array ('id_person' => $row['id_person'], 'username' => $row['username'], 
			'password' => $row['password'], 'name' => $row['name'], 'surname' => $row['surname'], 
			'email' => $row['email'], 'gender' => $row['gender'], 'city' => $row['city']);
		
		if( $row === false )
			return null;
		else
			return $param;
	}

	function updateName($username, $name)
	{
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare('UPDATE person_nova SET name = :name WHERE username = :username');
			$st->execute( array( 'username' => $username , 'name' => $name ) );
		}
		catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }
	}

	function updateDate($username, $date)
	{
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare('UPDATE person_nova SET date_of_birth = :date WHERE username = :username');
			$st->execute( array( 'username' => $username , 'date' => $date ) );
		}
		catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }
	}

	function getBookByName( $name )
	{
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare('SELECT * FROM book WHERE title = :name');
			$st->execute( array( 'name' => $name ) );
		}
		catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

		$row = $st->fetch();
		if( $row === false )
			return null;
		else
			return new Book( $row['title'], $row['author'], $row['year'] );
	}

	//funkcija koja vraca sve ponudjene knjige
	function getAllBooks()
	{
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare( 'SELECT id_book, title, author FROM book ORDER BY author' );
			$st->execute();
		}
		catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

		$arr = array();
		while( $row = $st->fetch() )
		{
			$arr[] = new Book( $row['id_book'], $row['title'], $row['author'] );
		}

		return $arr;
	}

	//funkcija koja omogu�ava korisniku da lajka knjigu $id_book
	function LikeBook($id_person, $id_book)
	{
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare(  );
			$st->execute();
		}
		catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

	}

	// funkcija za svaku osobu vra�a knjige koje se osobi svi�aju
	function getLikedBooks($id_person)
	{
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare( 'SELECT id_book, title, author 
									FROM book b 
									JOIN like_book lb ON b.id_book = lb.id_book
									WHERE lb.id_person = :id_person;' );
			$st->execute();
		}
		catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

		$arr = array();
		while( $row = $st->fetch() )
		{
			$arr[] = new Book( $row['id_book'], $row['title'], $row['author'] );
		}

		return $arr;
	}

	//funkcija koja vra�a sve ponu�ene sportove
	function getAllSports()
	{
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare( 'SELECT id_sport, type FROM sport ORDER BY type' );
			$st->execute();
		}
		catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

		$arr = array();
		while( $row = $st->fetch() )
		{
			$arr[] = new Sport( $row['id_sport'], $row['type'] );
		}

		return $arr;
	}
	
	//funkcija koja omogu�ava korisniku $id_person da lajka sport $id_sport
	function LikeSport($id_person, $id_sport)
	{
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare(  );
			$st->execute();
		}
		catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }
	}

	//funkcija koja vra�a sportove koji se svi�aju odre�enoj osobi s $id_person
	function getLikedSports($id_person)
	{
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare( 'SELECT id_sport, type 
									FROM sport s 
									JOIN like_sport ls ON s.id_sport = ls.id_sport
									WHERE lb.id_person = :id_person;' );
			$st->execute();
		}
		catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

		$arr = array();
		while( $row = $st->fetch() )
		{
			$arr[] = new Sport( $row['id_sport'], $row['type'] );
		}

		return $arr;
	}

	//funkcija koja sve ponu�ene bendove
	function getAllBands()
	{
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare( 'SELECT id_band, name, genre FROM band ORDER BY name' );
			$st->execute();
		}
		catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

		$arr = array();
		while( $row = $st->fetch() )
		{
			$arr[] = new Band( $row['id_band'], $row['name'], $row['genre'] );
		}

		return $arr;
	}

	//funkcija koja omogu�ava korisniku $id_person da lajka bend $id_band
	function LikeBand($id_person, $id_band)
	{
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare(  );
			$st->execute();
		}
		catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

	}

	//funkcija koja vra�a bendove koji se svi�aju odre�enoj osobi s $id_person
	function getLikedBands($id_person)
	{
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare( 'SELECT id_band, name, genre
									FROM band b 
									JOIN like_band lb ON b.id_band = lb.id_band
									WHERE lb.id_person = :id_person;' );
			$st->execute();
		}
		catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

		$arr = array();
		while( $row = $st->fetch() )
		{
			$arr[] = new Band( $row['id_band'], $row['name'], $row['genre'] );
		}

		return $arr;
	}

	// funkcija koja vra�a sve ponu�ene filmove
	function getAllMovies()
	{
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare( 'SELECT id_movie, title, genre FROM movie ORDER BY title' );
			$st->execute();
		}
		catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

		$arr = array();
		while( $row = $st->fetch() )
		{
			$arr[] = new Movie( $row['id_movie'], $row['title'], $row['genre'] );
		}

		return $arr;
	}

	//funkcija koja omogu�ava korisniku $id_person da lajka film $id_movie
	function LikeMovie($id_person, $id_movie)
	{
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare(  );
			$st->execute();
		}
		catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

	}

	//funkcija koja vra�a filmove koji se svi�aju odre�enoj osobi s $id_person
	function getLikedMovies($id_person)
	{
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare( 'SELECT id_movie, title, genre
									FROM movie m
									JOIN like_movie lm ON m.id_band = lm.id_band
									WHERE lm.id_person = :id_person;' );
			$st->execute();
		}
		catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

		$arr = array();
		while( $row = $st->fetch() )
		{
			$arr[] = new Movie( $row['id_movie'], $row['title'], $row['genre'] );
		}

		return $arr;
	}

	function checkUser($username, $password){
		$db = DB::getConnection();

		try{
			$st = $db->prepare( 'SELECT id_person,username, password FROM person_nova WHERE username=:username' );
			$st->execute( array( 'username' => $username ) );
		}
		catch( PDOException $e ){
			echo 'Greska u Service.class.php!';
			return 0;
		}

		$row = $st -> fetch();
		if($row === false){
			// Taj user ne postoji, upit u bazu nije vratio ni�ta.
			return 0;
		}
		else{
			// Postoji user. Dohvati hash njegovog passworda.
			$pass = $row[ 'password'];
			// Da li je password dobar?
			if( $pass == $password){
				return $row['username'];
			}
			else{
				// Nije dobar. Crtaj opet login formu s pripadnom porukom.
				return 0;
			}
		}
	}

	// funkcija za dodavanje knjige u database book
	public function AddBook ($title, $author, $years) {
		$db = DB::getConnection();

		try{
			$st = $db->prepare("INSERT INTO book (title, author, year) VALUES(:title, :author, :year)");
			$st->execute ();
		}
		catch( PDOException $e ){
			echo 'Greska u Service.class.php!';
			return 0;
		}
		
	}

	// funkcija za dodavanje filma u database movie
	public function AddMovie ($title, $director, $year, $genre) {
		$db = DB::getConnection();

		try{
			$st = $db->prepare("INSERT INTO movie (title, director, year, genre) VALUES(:title, :director, :year, :genre)");
			$st->execute ();
		}
		catch( PDOException $e ){
			echo 'Greska u Service.class.php!';
			return 0;
		}

	}

	// funkcija za dodavanje sporta u database sport
	public function AddSport ($type) {
		$db = DB::getConnection();

		try{
			$st = $db->prepare("INSERT INTO sport (type) VALUES(:type)");
			$st->execute ();
		}
		catch( PDOException $e ){
			echo 'Greska u Service.class.php!';
			return 0;
		}

	}

	// funkcija za dodavanje kluba u database club
	public function AddClub ($name, $city, $country, $id_sporta) {
		$db = DB::getConnection();

		try{
			$st = $db->prepare("INSERT INTO club (name, city, country, id_sporta) VALUES(:name, :city, :country, :id_sporta)");
			$st->execute ();
		}
		catch( PDOException $e ){
			echo 'Greska u Service.class.php!';
			return 0;
		}

	}

	// funkcija za dodavanje benda u database band
	public function AddBand ($name, $country, $genre) {
		$db = DB::getConnection();

		try{
			$st = $db->prepare("INSERT INTO band (name, country, genre) VALUES(:name, :country, :genre)");
			$st->execute ();
		}
		catch( PDOException $e ){
			echo 'Greska u Service.class.php!';
			return 0;
		}

	}
	
	//neo4j-------------------------------------------------------------------------------------------------------------------------------

	function getUserById( $id )
    {
        //ID MORA BITI STRING!
        $idString = strval( $id );
        $results = $client->run('MATCH (p:Person {id_person: $id}) RETURN p', ['id' => $idString]);

        foreach($results as $result)
        {
            $node = $result->get('p');
            $param = ['id_person' => $node->getProperty('id_person'), 'name' => $node->getProperty('name'), 'surname' => $node->getProperty('surname')];
        }

        return $param;
    } 

    function getUserByUsername( $username )
    {
        
        $results = $client->run('MATCH (p:Person {username: $ime}) RETURN p', ['ime' => $username]);
        $param = [];

        foreach($results as $result)
        {
            $node = $result->get('p');
            $param = ['name' => $node->getProperty('name'), 'surname' => $node->getProperty('surname')];
        }
        return $param;
    }

    //vraca listu id-jeva koga sve user s danim id-jem followa
    //vraca null ako user ne followa nikoga
    function getFollowing( $id )
    { 
        $param = [];
        $count = 0;
        $hasResults = FALSE;

        $query = 'MATCH (p:Person {id_person: $id_follows})-[:FOLLOWS]->(followed:Person) RETURN followed.id_person AS followedId';
        $results = $client->run($query, ['id_follows' => $id]);

        foreach ($results as $result) {
            $node = $result->get('followedId');
            $param[] = $node;
            $hasResults = true;
            ++$count;
        }
        if (!$hasResults) {
            return NULL;
        } else {
            return $param;
        }
    }

    //vraca ko prati usera s danim id-jem
    //ako nema pratitelja vraca NULL
    function getFollowers( $id )
    {
        $param = [];
        $count = 0;
        $hasResults = FALSE;
        
        $query = 'MATCH (follower:Person)-[:FOLLOWS]->(p:Person {id_person: $id_followed}) RETURN follower.id_person AS followerId';
        $results = $client->run($query, ['id_followed' => $id]);
        
        foreach ($results as $result) {
            $node = $result->get('followerId');
            $param[] = $node;
            $hasResults = true;
            ++$count;
        }
        
        if (!$hasResults) {
            return NULL;
        } else {
            return $param;
        }
    }

    function addFollow( $follows, $followed)
    {
        $query = 'MATCH (p1:Person {username: $follows}), (p2:Person {username: $followed}) CREATE (p1)-[:FOLLOWS]->(p2)';
        $client->run($query, ['follows' => $follows, 'followed' => $followed]);

    }

    function removeFollow()
    {
        $query = 'MATCH (p1:Person {username: $follows})-[r:FOLLOWS]->(p2:Person {username: $followed}) DELETE r';
        $client->run($query, ['follows' => $follows, 'followed' => $followed]);
    }

    function addUser( $id, $username, $name, $surname)
    {

        $query = 'CREATE (p:Person {id_person : $id , username: $username, name: $name, surname: $surname}) RETURN p';
        $result = $client->run($query, ['id' => $id, 'username' => $username, 'name' => $name, 'surname' => $surname]);

        if ($result->count() > 0) {
            echo "Novi korisnik je uspješno dodan.";
        } else {
            echo "Dodavanje novog korisnika nije uspjelo.";
        }
    }



};

?>

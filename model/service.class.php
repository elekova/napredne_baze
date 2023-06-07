<?php

require __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../app/database/db.class.php';
require_once __DIR__ . '/../vendor/autoload.php';
require_once 'person.class.php';
require_once 'book.class.php';
require_once 'movie.class.php';
require_once 'sport.class.php';
require_once 'club.class.php';
require_once 'band.class.php';


use Laudis\Neo4j\ClientBuilder;
use Laudis\Neo4j\Authentication\Authenticate;

class Service
{
	function getPersonById( $id )
	{
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare('SELECT * FROM person_nova WHERE id_person = :id');
			$st->execute( array( 'id' => $id ) );
		}
		catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

		$row = $st->fetch();
		$param = array ('id_person' => $row['id_person'], 'username' => $row['username'],
			'password' => $row['password'], 'name' => $row['name'], 'surname' => $row['surname'],
			'email' => $row['email'], 'gender' => $row['gender'], 'city' => $row['city'],
			'region' => $row['region'], 'date_of_birth' => $row['date_of_birth'] );

		if( $row === false )
			return null;
		else
			return $param;
	}

	function getPersonByUsername( $username )
	{
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare('SELECT * FROM person_nova WHERE username = :username');
			$st->execute( array( 'username' => $username ) );
		}
		catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }
		$row = $st->fetch();
		if( $row === false )
			return null;
		$param = array ('id_person' => $row['id_person'], 'username' => $row['username'],
			'password' => $row['password'], 'name' => $row['name'], 'surname' => $row['surname'],
			'email' => $row['email'], 'gender' => $row['gender'], 'city' => $row['city'] ,
			'region' => $row['region'], 'date_of_birth' => $row['date_of_birth']);

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

	function updateSurname($username, $surname)
	{
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare('UPDATE person_nova SET surname = :surname WHERE username = :username');
			$st->execute( array( 'username' => $username , 'surname' => $surname ) );
		}
		catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }
	}

	function updateEmail($username, $email)
	{
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare('UPDATE person_nova SET email = :email WHERE username = :username');
			$st->execute( array( 'username' => $username , 'email' => $email ) );
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

	function updateCity($username, $city)
	{
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare('UPDATE person_nova SET city = :city WHERE username = :username');
			$st->execute( array( 'username' => $username , 'city' => $city) );
		}
		catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }
	}

	function updateRegion($username, $region)
	{
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare('UPDATE person_nova SET region = :region WHERE username = :username');
			$st->execute( array( 'username' => $username , 'region' => $region ) );
		}
		catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }
	}

	//MYCREW-----------------------------------------------------------------------------------------------------------------
	//BOOK-------------------------------------------------------------------------------------------------------------------
	public function getBookByName( $name )
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
			return new Book( $row['id_book'], $row['title'], $row['author'], $row['year'] );
	}

	//funkcija koja vraca sve ponudjene knjige
	function getAllBooks()
	{
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare('SELECT * FROM book ORDER BY author');
			$st->execute();
		}
		catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

		$arr = array();
		while( $row = $st->fetch() )
		{
			$arr[] = new Book( $row['id_book'], $row['title'], $row['author'], $row['year'] );
		}

		return $arr;
	}


	function likeBook($id_person, $id_book)
	{
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare( 'INSERT INTO like_book (id_person, id_book) VALUES (:id_person, :id_book)' );
			$st->execute( array('id_person' => $id_person, 'id_book' => $id_book) );
		}
		catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

	}

	// funkcija za svaku osobu vra�a knjige koje se osobi svi�aju
	function getLikedBooks($id_person)
	{
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare( 'SELECT b.id_book, b.title, b.author, b.year
									FROM book b
									JOIN like_book lb ON b.id_book = lb.id_book
									WHERE lb.id_person = :id_person;' );
			$st->execute( array( 'id_person' => $id_person ) );
		}
		catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

		$arr = array();
		while( $row = $st->fetch() )
		{
			$arr[] = new Book( $row['id_book'], $row['title'], $row['author'], $row['year'] );
		}

		return $arr;
	}

	// funkcija za dodavanje knjige u database book
	public function addBook ($title, $author, $year) {
		$db = DB::getConnection();

		try{
			$st = $db->prepare("INSERT INTO book (title, author, year) VALUES (:title, :author, :year)");
			$st->execute(array('title' => $title, 'author' => $author, 'year' => $year));
		}
		catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

	}

	function unlikeBook( $id_person, $id_book)
	{
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare( 'DELETE FROM like_book WHERE id_person = :id_person AND id_book = :id_book' );
			$st->execute( array('id_person' => $id_person, 'id_book' => $id_book) );
		}
		catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }
	}

	function doILikeBook( $id_person, $id_book)
	{
		try
		{
			$db = DB::getConnection();
        	$st = $db->prepare('SELECT EXISTS(SELECT 1 FROM like_book WHERE id_person = :id_person AND id_book = :id_book)');
        	$st->execute(array('id_person' => $id_person, 'id_book' => $id_book));

        return $st->fetchColumn() > 0; // Vraca true ako postoji redak, inace false
		} catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }
	}

	function getCommonBooks( $id1, $id2)
	{
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare( 'SELECT b.title
								FROM like_book AS lb1
								JOIN like_book AS lb2 ON lb1.id_book = lb2.id_book
								JOIN book AS b ON lb1.id_book = b.id_book
								WHERE lb1.id_person = :id1 AND lb2.id_person = :id2' );
			$st->execute( array('id1' => $id1, 'id2' => $id2) );
		}
		catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

		$arr = array();

		while( $row = $st->fetch() )
		{
			$arr[] = $this->getBookByName($row['title']);
		}
		return $arr;

	}

	function getSearchedBooks( $title, $author)
	{
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare( 'SELECT * FROM book WHERE title LIKE :title OR author LIKE :author' );
            $st->execute(array( 'title' => '%' . $title . '%', 'author' => '%' . $author . '%' ));
		}
		catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

		$arr = array();

		while( $row = $st->fetch() )
		{
			$arr[] = $this->getBookByName($row['title']);
		}
		return $arr;

	}

	//SPORT---------------------------------------------------------------------------------------------------------------------------
	//funkcija koja vra�a sve ponu�ene sportove

	function getSportByType( $type )
	{
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare('SELECT * FROM sport WHERE type = :type');

			$st->execute( array( 'type' => $type ) );
		}
		catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

		$row = $st->fetch();
		if( $row === false )
			return null;
		else
			return new Sport( $row['id_sport'], $row['type']);
	}

	function getSportById( $id )
	{
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare('SELECT * FROM sport WHERE id_sport = :id');
			$st->execute( array( 'id' => $id ) );
		}
		catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

		$row = $st->fetch();
		if( $row === false )
			return null;
		else
			return new Sport( $row['id_sport'], $row['type']);
	}

	function getAllSports()
	{
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare( 'SELECT * FROM sport ORDER BY type' );
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
	function likeSport($id_person, $id_sport)
	{
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare( 'INSERT INTO like_sport (id_person, id_sport) VALUES (:id_person, :id_sport)' );
			$st->execute( array('id_person' => $id_person, 'id_sport' => $id_sport) );
		}
		catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }
	}

	//funkcija koja vra�a sportove koji se svi�aju odre�enoj osobi s $id_person
	function getLikedSports($id_person)
	{
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare( 'SELECT s.id_sport, s.type
									FROM sport s
									JOIN like_sport ls ON s.id_sport = ls.id_sport
									WHERE ls.id_person = :id_person;' );
			$st->execute(array('id_person' => $id_person));
		}
		catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

		$arr = array();
		while( $row = $st->fetch() )
		{
			$arr[] = new Sport( $row['id_sport'], $row['type'] );
		}

		return $arr;
	}

	// funkcija za dodavanje sporta u database sport
	public function addSport ($type) {
		$db = DB::getConnection();

		try{
			$st = $db->prepare("INSERT INTO sport (type) VALUES(:type)");
			$st->execute (array('type' => $type));
		}
		catch( PDOException $e ){
			echo 'Greska u Service.class.php!';
			return 0;
		}

	}
	function unlikeSport( $id_person, $id_sport)
	{
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare( 'DELETE FROM like_sport WHERE id_person = :id_person AND id_sport = :id_sport' );
			$st->execute( array('id_person' => $id_person, 'id_sport' => $id_sport) );
		}
		catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }
	}

	function doILikeSport( $id_person, $id_sport)
	{
		try
		{
			$db = DB::getConnection();
        	$st = $db->prepare('SELECT EXISTS(SELECT 1 FROM like_sport WHERE id_person = :id_person AND id_sport = :id_sport)');
        	$st->execute(array('id_person' => $id_person, 'id_sport' => $id_sport));

        return $st->fetchColumn() > 0; // Vraca true ako postoji redak, inace false
		} catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }
	}

	function getSportsByType( $type )
	{
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare('SELECT * FROM sport WHERE type = :type');
			$st->execute( array( 'type' => $type ) );
		}
		catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

		$row = $st->fetch();
		if( $row === false )
			return null;
		else
			return new Sport( $row['id_sport'], $row['type'] );
	}

	function getCommonSports( $id1, $id2)
	{
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare( 'SELECT s.type
								FROM like_sport AS ls1
								JOIN like_sport AS ls2 ON ls1.id_sport = ls2.id_sport
								JOIN sport AS s ON ls1.id_sport = s.id_sport
								WHERE ls1.id_person = :id1 AND ls2.id_person = :id2' );
			$st->execute( array('id1' => $id1, 'id2' => $id2) );
		}
		catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

		$arr = array();


		while( $row = $st->fetch() )
		{
			$arr[] = $this->getSportByType($row['type']);
		}
		return $arr;

	}

	//CLUB----------------------------------------------------------------------------------------------------------------

	function getClubByName( $name )
	{
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare('SELECT * FROM club WHERE name = :name');
			$st->execute( array( 'name' => $name ) );
		}
		catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

		$row = $st->fetch();
		if( $row === false )
			return null;
		else
			return new Club( $row['id_club'], $row['name'], $row['city'], $row['country'], $row['id_sporta'] );
	}



	//funkcija koja vraca sve ponudjene knjige
	function getAllClubs()
	{
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare('SELECT * FROM club ORDER BY name');
			$st->execute();
		}
		catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

		$arr = array();
		while( $row = $st->fetch() )
		{
			$arr[] = new Club( $row['id_club'], $row['name'], $row['city'], $row['country'], $row['id_sporta'] );
		}

		return $arr;
	}


	function likeClub($id_person, $id_club)
	{
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare( 'INSERT INTO like_club (id_person, id_club) VALUES (:id_person, :id_club)' );
			$st->execute( array('id_person' => $id_person, 'id_club' => $id_club) );
		}
		catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

	}

	// funkcija za svaku osobu vra�a knjige koje se osobi svi�aju
	function getLikedClubs($id_person)
	{
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare('SELECT c.id_club, c.name, c.city, c.country, c.id_sporta
                        FROM club c
                        JOIN like_club lc ON c.id_club = lc.id_club
                        WHERE lc.id_person = :id_person;');
			$st->execute( array( 'id_person' => $id_person ) );
		}
		catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

		$arr = array();
		while( $row = $st->fetch() )
		{
			$arr[] = new Club( $row['id_club'], $row['name'], $row['city'], $row['country'], $row['id_sporta'] );
		}

		return $arr;
	}



	function unlikeClub( $id_person, $id_club)
	{
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare( 'DELETE FROM like_club WHERE id_person = :id_person AND id_club = :id_club' );
			$st->execute( array('id_person' => $id_person, 'id_club' => $id_club) );
		}
		catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }
	}

	function doILikeClub( $id_person, $id_club)
	{
		try
		{
			$db = DB::getConnection();
        	$st = $db->prepare('SELECT EXISTS(SELECT 1 FROM like_club WHERE id_person = :id_person AND id_club = :id_club)');
        	$st->execute(array('id_person' => $id_person, 'id_club' => $id_club));

        return $st->fetchColumn() > 0; // Vraca true ako postoji redak, inace false
		} catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }
	}

	// funkcija za dodavanje kluba u database club
	public function addClub ($name, $city, $country, $id_sporta) {
		$db = DB::getConnection();

		try{
			$st = $db->prepare("INSERT INTO club (name, city, country, id_sporta) VALUES(:name, :city, :country, :id_sporta)");
			$st->execute (array('name' => $name, 'city' => $city, 'country' => $country, 'id_sporta' => $id_sporta));
		}
		catch( PDOException $e ){
			echo 'Greska u Service.class.php!';
			return 0;
		}

	}

	function getSearchedClubs( $name, $city, $country)
	{
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare( 'SELECT * FROM club WHERE name LIKE :name OR city LIKE :city OR country LIKE :country' );
            $st->execute(array( 'name' => '%' . $name . '%', 'city' => '%' . $city . '%', 'country' => '%' . $country . '%' ));
		}
		catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

		$arr = array();

		while( $row = $st->fetch() )
		{
			$arr[] = $this->getClubByName($row['name']);
		}
		return $arr;

	}

//CLUB----------------------------------------------------------------------------------------------------------------------
//BAND-----------------------------------------------------------------------------------------------------------------

	function getAllBands()
	{
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare( 'SELECT * FROM band ORDER BY name' );
			$st->execute();
		}
		catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

		$arr = array();
		while( $row = $st->fetch() )
		{
			$arr[] = new Band( $row['id_band'], $row['name'],  $row['country'],$row['genre'] );
		}

		return $arr;
	}

	function likeBand($id_person, $id_band)
	{
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare( 'INSERT INTO like_band (id_person, id_band) VALUES (:id_person, :id_band)' );
			$st->execute( array('id_person' => $id_person, 'id_band' => $id_band) );
		}
		catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

	}

	function getLikedBands($id_person)
	{
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare( 'SELECT b.id_band, b.name, b.country, b.genre
									FROM band b
									JOIN like_band lb ON b.id_band = lb.id_band
									WHERE lb.id_person = :id_person;' );
			$st->execute(array('id_person' => $id_person));
		}
		catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

		$arr = array();
		while( $row = $st->fetch() )
		{
			$arr[] = new Band( $row['id_band'], $row['name'],  $row['country'],$row['genre'] );
		}

		return $arr;
	}



	public function addBand ($name, $country, $genre) {
		$db = DB::getConnection();

		try{
			$st = $db->prepare("INSERT INTO band (name, country, genre) VALUES(:name, :country,  :genre)");
			$st->execute (array('name' => $name, 'country' => $country, 'genre' => $genre));
		} catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

	}

	function unlikeBand( $id_person, $id_band)
	{
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare( 'DELETE FROM like_band WHERE id_person = :id_person AND id_band = :id_band' );
			$st->execute( array('id_person' => $id_person, 'id_band' => $id_band) );
		}
		catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }
	}

	function doILikeBand( $id_person, $id_band)
	{
		try
		{
			$db = DB::getConnection();
        	$st = $db->prepare('SELECT EXISTS(SELECT 1 FROM like_band WHERE id_person = :id_person AND id_band = :id_band)');
        	$st->execute(array('id_person' => $id_person, 'id_band' => $id_band));

        return $st->fetchColumn() > 0; // Vraca true ako postoji redak, inace false
		} catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }
	}

	function getBandByName( $name )
	{
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare('SELECT * FROM band WHERE name = :name');
			$st->execute( array( 'name' => $name ) );
		}
		catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

		$row = $st->fetch();
		if( $row === false )
			return null;
		else
			return new Band( $row['id_band'], $row['name'] , $row['country'], $row['genre']);
	}

	function getCommonBands( $id1, $id2)
	{
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare( 'SELECT b.name
								FROM like_band AS lb1
								JOIN like_band AS lb2 ON lb1.id_band = lb2.id_band
								JOIN band AS b ON lb1.id_band = b.id_band
								WHERE lb1.id_person = :id1 AND lb2.id_person = :id2' );
			$st->execute( array('id1' => $id1, 'id2' => $id2) );
		}
		catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

		$arr = array();


		while( $row = $st->fetch() )
		{
			$arr[] = $this->getBandByName($row['name']);
		}
		return $arr;

	}

	//MOVIES------------------------------------------------------------------------------------------------------------------

	function getAllMovies()
	{
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare( 'SELECT * FROM movie ORDER BY title' );
			$st->execute();
		}
		catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

		$arr = array();
		while( $row = $st->fetch() )
		{
			$arr[] = new Movie( $row['id_movie'], $row['title'], $row['director'], $row['year'], $row['genre'] );
		}
		return $arr;
	}

	function getMovieByName( $name )
	{
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare('SELECT * FROM movie WHERE title = :name');
			$st->execute( array( 'name' => $name ) );
		}
		catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

		$row = $st->fetch();
		if( $row === false )
			return null;
		else
			return new Movie( $row['id_movie'], $row['title'], $row['director'], $row['year'], $row['genre'] );
	}

	function likeMovie($id_person, $id_movie)
	{
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare( 'INSERT INTO like_movie (id_person, id_movie) VALUES (:id_person, :id_movie)' );
			$st->execute( array('id_person' => $id_person, 'id_movie' => $id_movie) );
		}
		catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

	}

	function getLikedMovies($id_person)
	{
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare( 'SELECT m.id_movie, m.title, m.director, m.year, m.genre
									FROM movie m
									JOIN like_movie lm ON m.id_movie = lm.id_movie
									WHERE lm.id_person = :id_person;' );
			$st->execute( array( 'id_person' => $id_person ) );
		} catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

		$arr = array();
		while( $row = $st->fetch() )
		{
			$arr[] = new Movie( $row['id_movie'], $row['title'], $row['director'], $row['year'], $row['genre'] );
		}
		return $arr;
	}

	public function addMovie ($title, $director, $year, $genre) {
		$db = DB::getConnection();

		try{
			$st = $db->prepare("INSERT INTO movie (title, director, year, genre) VALUES(:title, :director, :year, :genre)");
			$st->execute (array('title' => $title, 'director' => $director, 'year' => $year, 'genre' => $genre));
		} catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

	}

	function unlikeMovie( $id_person, $id_movie)
	{
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare( 'DELETE FROM like_movie WHERE id_person = :id_person AND id_movie = :id_movie' );
			$st->execute( array('id_person' => $id_person, 'id_movie' => $id_movie) );
		}
		catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }
	}

	function doILikeMovie( $id_person, $id_movie)
	{
		try
		{
			$db = DB::getConnection();
        	$st = $db->prepare('SELECT EXISTS(SELECT 1 FROM like_movie WHERE id_person = :id_person AND id_movie = :id_movie)');
        	$st->execute(array('id_person' => $id_person, 'id_movie' => $id_movie));

        return $st->fetchColumn() > 0; // Vraca true ako postoji redak, inace false
		} catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }
	}

	function getCommonMovies( $id1, $id2)
	{
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare( 'SELECT m.title
								FROM like_movie AS lm1
								JOIN like_movie AS lm2 ON lm1.id_movie = lm2.id_movie
								JOIN movie AS m ON lm1.id_movie = m.id_movie
								WHERE lm1.id_person = :id1 AND lm2.id_person = :id2' );
			$st->execute( array('id1' => $id1, 'id2' => $id2) );
		}
		catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

		$arr = array();


		while( $row = $st->fetch() )
		{
			$arr[] = $this->getMovieByName($row['title']);
		}
		return $arr;

	}

	//USER----------------------------------------------------------------------------------------------------------------

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

	//neo4j-------------------------------------------------------------------------------------------------------------------------------

	function getUserById( $id )
    {
        //ID MORA BITI STRING!
		$url = 'neo4j+s://d9646c66.databases.neo4j.io:7687';
		$auth = Authenticate::basic('neo4j', 'gIF97J_pKsT9Nj_Vmm5fMNEI1x1TAUogZut-4j53v5A');
		$client = ClientBuilder::create()->withDriver('neo4j', $url, $auth)->build();
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
		$url = 'neo4j+s://d9646c66.databases.neo4j.io:7687';
		$auth = Authenticate::basic('neo4j', 'gIF97J_pKsT9Nj_Vmm5fMNEI1x1TAUogZut-4j53v5A');
		$client = ClientBuilder::create()->withDriver('neo4j', $url, $auth)->build();

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
		$url = 'neo4j+s://d9646c66.databases.neo4j.io:7687';
		$auth = Authenticate::basic('neo4j', 'gIF97J_pKsT9Nj_Vmm5fMNEI1x1TAUogZut-4j53v5A');
		$client = ClientBuilder::create()->withDriver('neo4j', $url, $auth)->build();

        $param = [];
        $hasResults = false;

        $query = 'MATCH (p:Person {id_person: $id_follows})-[:FOLLOWS]->(followed:Person) RETURN followed.id_person AS followedId';
        $results = $client->run($query, ['id_follows' => $id]);

        foreach ($results as $result) {
            $node = $result->get('followedId');
            $param[] = $node;
            $hasResults = true;
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
		$url = 'neo4j+s://d9646c66.databases.neo4j.io:7687';
		$auth = Authenticate::basic('neo4j', 'gIF97J_pKsT9Nj_Vmm5fMNEI1x1TAUogZut-4j53v5A');
		$client = ClientBuilder::create()->withDriver('neo4j', $url, $auth)->build();

        $param = [];
        $hasResults = false;

        $query = 'MATCH (follower:Person)-[:FOLLOWS]->(p:Person {id_person: $id_followed}) RETURN follower.id_person AS followerId';
        $results = $client->run($query, ['id_followed' => $id]);

        foreach ($results as $result) {
            $node = $result->get('followerId');
            $param[] = $node;
            $hasResults = true;
        }

        if (!$hasResults) {
            return NULL;
        } else {
            return $param;
        }
    }

    function addFollow( $follows, $followed)
    {
		$url = 'neo4j+s://d9646c66.databases.neo4j.io:7687';
		$auth = Authenticate::basic('neo4j', 'gIF97J_pKsT9Nj_Vmm5fMNEI1x1TAUogZut-4j53v5A');
		$client = ClientBuilder::create()->withDriver('neo4j', $url, $auth)->build();

        $query = 'MATCH (p1:Person {username: $follows}), (p2:Person {username: $followed}) MERGE (p1)-[:FOLLOWS]->(p2)';
        $client->run($query, ['follows' => $follows, 'followed' => $followed]);

    }

    function removeFollow($follows, $followed)
    {
		$url = 'neo4j+s://d9646c66.databases.neo4j.io:7687';
		$auth = Authenticate::basic('neo4j', 'gIF97J_pKsT9Nj_Vmm5fMNEI1x1TAUogZut-4j53v5A');
		$client = ClientBuilder::create()->withDriver('neo4j', $url, $auth)->build();

        $query = 'MATCH (p1:Person {username: $follows})-[r:FOLLOWS]->(p2:Person {username: $followed}) DELETE r';
        $client->run($query, ['follows' => $follows, 'followed' => $followed]);
    }

    function addUser( $id, $username, $name, $surname)
    {
		$url = 'neo4j+s://d9646c66.databases.neo4j.io:7687';
		$auth = Authenticate::basic('neo4j', 'gIF97J_pKsT9Nj_Vmm5fMNEI1x1TAUogZut-4j53v5A');
		$client = ClientBuilder::create()->withDriver('neo4j', $url, $auth)->build();

        $query = 'CREATE (p:Person {id_person : $id , username: $username, name: $name, surname: $surname}) RETURN p';
        $result = $client->run($query, ['id' => $id, 'username' => $username, 'name' => $name, 'surname' => $surname]);

        if ($result->count() > 0) {
            echo "Novi korisnik je uspješno dodan.";
        } else {
            echo "Dodavanje novog korisnika nije uspjelo.";
        }
    }

	function updateUserName( $username , $name )
	{
		$url = 'neo4j+s://d9646c66.databases.neo4j.io:7687';
		$auth = Authenticate::basic('neo4j', 'gIF97J_pKsT9Nj_Vmm5fMNEI1x1TAUogZut-4j53v5A');
		$client = ClientBuilder::create()->withDriver('neo4j', $url, $auth)->build();

		$query = 'MATCH (p:Person {username: $username}) SET p.name = $name ';
        $results = $client->run($query, ['username' => $username , 'name' => $name]);
	}

	function updateUserSurname( $username , $surname )
	{
		$url = 'neo4j+s://d9646c66.databases.neo4j.io:7687';
		$auth = Authenticate::basic('neo4j', 'gIF97J_pKsT9Nj_Vmm5fMNEI1x1TAUogZut-4j53v5A');
		$client = ClientBuilder::create()->withDriver('neo4j', $url, $auth)->build();

		$query = 'MATCH (p:Person {username: $username}) SET p.surname = $surname ';
        $results = $client->run($query, ['username' => $username, 'surname' => $surname] );
	}

};

?>

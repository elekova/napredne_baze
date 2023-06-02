<?php

class LibraryService
{
	function getPersonById( $id )
	{
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare( 'SELECT id_person, username, name, surname, password FROM person WHERE id=:id' );
			$st->execute( array( 'id_person' => $id ) );
		}
		catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

		$row = $st->fetch();
		if( $row === false )
			return null;
		else
			return new Person( $row['id_person'], $row['username'], $row['name'], $row['surname'], $row['password'] );
	}

    function addFriend(User $friend)
    {
        $this->friends[] = $friend;
    }

    function removeFriend(User $friend)
    {
        $index = array_search($friend, $this->friends);
        if ($index !== false) {
            array_splice($this->friends, $index, 1);
        }
    }

    function addFavorite(User $favorite)
    {
        $this->favorites[] = $favorite;
    }

    function removeFavorite(User $favorite)
    {
        $index = array_search($favorite, $this->favorites);
        if ($index !== false) {
            array_splice($this->favorites, $index, 1);
        }
    }

	function getPersonByName( $name )
	{
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare('SELECT id_person, username, name, surname, password FROM person WHERE CONCAT(name, " ", surname) LIKE :name');
			$st->execute( array( 'name' => $name ) );
		}
		catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

		$row = $st->fetch();
		if( $row === false )
			return null;
		else
			return new Person( $row['id_person'], $row['username'], $row['name'], $row['surname'], $row['password'] );
	}

	//ovo treba napraviti u skladu s neo4j
	function getAllFollowers( )
	{
	
	}

	//ovo treba napraviti u skladu sa Neo4j
	function getAllFollowing( )
	{
		
	}

	//funkcija koja vra�a sve ponu�ene knjige
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

	//login, ne znam dal radi (pise Nina)
	function checkUser($username, $password){
		$db = DB::getConnection();

		try{
			$st = $db->prepare( 'SELECT id, password FROM users WHERE name=:username' );
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
			$hash = $row[ 'password'];
			// Da li je password dobar?
			if( password_verify( $_POST['password'], $hash)){
				return $row['id'];
			}
			else{
				// Nije dobar. Crtaj opet login formu s pripadnom porukom.
				return 0;
			}
		}
	}

};

?>


<?php

require __DIR__ . '/vendor/autoload.php';

use Laudis\Neo4j\ClientBuilder;
use Laudis\Neo4j\Authentication\Authenticate;

$url = 'neo4j+s://d9646c66.databases.neo4j.io:7687';
$auth = Authenticate::basic('neo4j', 'gIF97J_pKsT9Nj_Vmm5fMNEI1x1TAUogZut-4j53v5A');
$client = ClientBuilder::create()->withDriver('neo4j', $url, $auth)->build();
$results = $client->run('MATCH (p:Person) RETURN p');

class DatabaseManager
{
    protected $results;

    function __construct()
    {
        $results = NULL;
    }

    
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
            echo '<br>';
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
            return $parm;
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

    function addUser( $username, $name, $surname)
    {

        $query = 'CREATE (p:Person {username: $username, name: $name, surname: $surname}) RETURN p';
        $result = $client->run($query, ['username' => $username, 'name' => $name, 'surname' => $surname]);

        if ($result->count() > 0) {
            echo "Novi korisnik je uspješno dodan.";
        } else {
            echo "Dodavanje novog korisnika nije uspjelo.";
        }
    }

}

?>
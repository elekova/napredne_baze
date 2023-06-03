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

    function getFriends( $username )
    {
        $results = $client->run('MATCH (p:Person) RETURN p');
    }

    function getFollowing()
    {

    }

    function getFollowers()
    {


        foreach($results as $result){
            $node = $result->get('p');
    
            echo $node->getProperty('name').'<br>';
        }
    }

    function addFriend()
    {

    }

    function followUser()
    {

    }

}

?>
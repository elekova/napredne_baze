<?php

//klasa koja omogucava spajanje na neo4j bazu
class DatabaseManager
{
    protected static $instance;
    protected $driver;

    function __construct()
    {
        $database = $_ENV['NEO4J_initial_dbms_default__database'] ?? 'movies'; //kak se zove database?
        $uri = $_ENV['CONNECTION_URI'] ?? sprintf('neo4j+s://d9646c66.databases.neo4j.io', $database); 
        $user = $_ENV['DB_USER'] ?? 'neo4j';
        //pametniji nacin za password?
        $password = $_ENV['DB_PASSWORD'] ?? 'gIF97J_pKsT9Nj_Vmm5fMNEI1x1TAUogZut-4j53v5A';
    
        $this->driver = \GraphAware\Neo4j\Client\ClientBuilder::create()
            ->addConnection('bolt', $uri, $user, $password)
            ->build();

    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function getDriver() {
        return $this->driver;
    }
}

?>
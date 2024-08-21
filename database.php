<?php
class Database {
    public $connection;
    public $statement;
    
    public function __construct($dbDriver,$config, $username, $password){
        //Get the link to the database using a config file
        $dsn = $dbDriver.":". http_build_query($config, '', ';');
        //Create valid connection data though a PHP Data Object and fetch the database
        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query($query, $params = []){
        //Execute a query on the database and return it.
        //First, prepare the query to send to the database.
        $this->statement = $this->connection->prepare($query);
        //Now execute it.
        $this->statement->execute($params);
        //Lastly, return it.
        return $this;
    }

    public function get()
    {
        return $this->statement->fetchAll();
    }

    public function find()
    {
        return $this->statement->fetch();
    }

    public function findOrFail()
    {
        $result = $this->find();

        if (! $result) {
            abort();
        }

        return $result;
    }
}
?>
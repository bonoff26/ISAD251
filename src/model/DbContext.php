<?php
include_once "../../src/api/objects/Item.php";


class DbContext
{
    private $db_server = 'proj-mysql.uopnet.plymouth.ac.uk';
    private $dbUser = 'ISAD251_TAllenbrook';
    private $dbPassword = 'ISAD251_22214098';
    private $dbDatabase = 'ISAD251_TAllenbrook';

    private $dataSourceName;
    private $connection;

    public function __construct(PDO $connection = null)
    {

    }


    public function connect() {
        $this->connection = null;
        try {
            if ($this->connection === null){
                $this->dataSourceName = 'mysql:dbname=' . $this->dbDatabase . ';host=' . $this->db_server;
                $this->connection = new PDO($this->dataSourceName, $this->dbUser, $this->dbPassword);
                $this->connection->setAttribute(
                    PDO::ATTR_ERRMODE,
                    PDO::ERRMODE_EXCEPTION
                );
            }
            return $this->connection;
        }
        catch (PDOException $err){
            echo "Connection failed ". $err->getMessage();
        }
    }




    public function checkDB($array) {
        $items = $this->getInfo();
        $newArray = array_keys($array);
        $values = array_values($array);
        for ($i = 0; $i < count($newArray); $i++) {
            if ($items[$i]->Quant() - $values[$i] < 0) {
                return false;
            }
        }
        return true;
    }
}


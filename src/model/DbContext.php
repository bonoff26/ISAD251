<?php
include_once "getDrinks.php";


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
        $this->connection = $connection;
        try {
            if ($this->connection === null){
                $this->dataSourceName = 'mysql:dbname=' . $this->dbDatabase . ';host=' . $this->db_server;
                $this->connection = new PDO($this->dataSourceName, $this->dbUser, $this->dbPassword);
                $this->connection->setAttribute(
                    PDO::ATTR_ERRMODE,
                    PDO::ERRMODE_EXCEPTION
                );
            }
        }
        catch (PDOException $err){
            echo "Connection failed ". $err->getMessage();
        }
    }

    public function getInfo() {
        $sql = "SELECT * FROM `menuitem`";

        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);

        $menuitems = [];

        if ($results) {
            foreach($results as $row)
            {
                $menuitem = new MenuItem($row['MenuItemID'], $row['Name'], $row['Description'], $row['Quantity'], $row['Price']);
                $menuitems[] = $menuitem;
                $_SESSION['NumOfItems'] = $_SESSION['NumOfItems'] + 1;
            }
        }

        return $menuitems;

    }
}


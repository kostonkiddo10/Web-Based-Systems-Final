<?php
class InventoryModel {
    public $items = array();
    private $db;

    public function __construct() {
        if(getenv("DB_LINK") && getenv("DB_USERNAME") && getenv("DB_PSSWD")) {
            $this->db = new PDO($_ENV["DB_LINK"], $_ENV["DB_USERNAME"], $_ENV["DB_PSSWD"]);
        } else {
            $this->db = new PDO('mysql:host=127.0.0.1:3306;dbname=club_resources;charset=utf8',
                 'root', 'root');
        }
    }

    public function getItems() {
        try {
            $query = $this->db->prepare('SELECT * FROM Inventory ORDER BY item_id');

            $query->execute();

            $this->items = $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            var_dump($e->errorInfo);
        }
    }
}

?>
<?php
class TransactionsModel {
    public $transactions = array();
    private $db;

    public function __construct() {
        if(getenv("DB_LINK") && getenv("DB_USERNAME") && getenv("DB_PSSWD")) {
            $this->db = new PDO($_ENV["DB_LINK"], $_ENV["DB_USERNAME"], $_ENV["DB_PSSWD"]);
        } else {
            $this->db = new PDO('mysql:host=127.0.0.1:3306;dbname=club_resources;charset=utf8',
                 'root', 'root');
        }
    }

    public function getTransactions() {
        try {
            $query = $this->db->prepare('SELECT * FROM Transactions ORDER BY transaction_id');

            $query->execute();

            $this->transactions = $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            var_dump($e->errorInfo);
        }
    }

    public function getTransactionById($id) {
        try {
            $stmt = $this->db->prepare('SELECT * FROM Transactions where transaction_id=:id');
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch(PDOException $ex) {
            var_dump($ex->getMessage());
        }
    }

    public function getMostRecentTransactionByItemId($id) {
        try {
            # Order by descending transaction id so that it always returns the most recent transaction
            $stmt = $this->db->prepare('SELECT * FROM Transactions where fk_item_id=:id ORDER BY transaction_id DESC');
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch(PDOException $ex) {
            var_dump($ex->getMessage());
        }
    }

    public function getTransactionByBorrowerId($id) {
        try {
            $stmt = $this->db->prepare('SELECT * FROM Transactions where fk_borrower_id=:id');
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch(PDOException $ex) {
            var_dump($ex->getMessage());
        }
    }

    public function newTransaction($itemID, $borrowerID) {
        try {
            $this->db->beginTransaction();
            $stmtMember = $this->db->prepare("INSERT INTO Transactions(fk_borrower_id,fk_item_id) 
                            VALUES(:itemID,:borrowerID)");
        

            $stmtMember->execute(array(':itemID' => $itemID, ':borrowerID' => $borrowerID));

            $sid = $this->db->lastInsertId();

            $this->db->commit();

            return $sid;
        } catch(PDOException $ex) {
            var_dump($ex->getMessage());
        }
    }
}

?>
<?php
class MembersModel {
    public $members = array();
    private $db;

    public function __construct() {
        if(getenv("DB_LINK") && getenv("DB_USERNAME") && getenv("DB_PSSWD")) {
            $this->db = new PDO($_ENV["DB_LINK"], $_ENV["DB_USERNAME"], $_ENV["DB_PSSWD"]);
        } else {
            $this->db = new PDO('mysql:host=127.0.0.1:3306;dbname=club_resources;charset=utf8',
                 'root', 'root');
        }
    }

    public function getMembers() {
        try {
            $query = $this->db->prepare('SELECT * FROM Members ORDER BY member_id');

            $query->execute();

            $this->members = $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            var_dump($e->errorInfo);
        }
    }

    public function getMember($id) {
        try {
            $stmt = $this->db->prepare('SELECT * FROM Members where member_id=:id');
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch(PDOException $ex) {
            var_dump($ex->getMessage());
        }
    }

    public function addMember($name, $email, $passwrd) {
        try {
            $this->db->beginTransaction();
            $stmtMember = $this->db->prepare("INSERT INTO Members(name,email,passwrd) 
                            VALUES(:name,:email,SHA2(:passwrd, 224))");
        

            $stmtMember->execute(array(':name' => $name, ':email' => $email, ':passwrd' => $passwrd));

            $sid = $this->db->lastInsertId();

            $this->db->commit();

            return $sid;
        } catch(PDOException $ex) {
            var_dump($ex->getMessage());
        }

    }

    public function validate_login($email, $password) {
        try {
            $stmtLogin = $this->db->prepare('SELECT * FROM Members WHERE email=:email and passwrd=SHA2(:password, 224)');
            $stmtLogin->bindParam(':email', $email, PDO::PARAM_STR);
            $stmtLogin->bindParam(':password', $password, PDO::PARAM_STR);
            $stmtLogin->execute();

            $result = $stmtLogin->fetch(PDO::FETCH_ASSOC);

            return $result;
        } catch(PDOException $ex) {
            var_dump($ex->getMessage());
        }
    }
}

?>
<?php 

require_once 'config.php';
class Admin extends Database {

    // LOGIN EXISTING USER

    public function admin_login($username, $password) {
        $sql = "SELECT username, password FROM admin WHERE username = :username AND password = :password";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['username'=>$username, 'password'=>$password]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    // TOTAL NUMBER OF USERS 

    public function totalcount($tablename){
        $sql = "SELECT * FROM $tablename";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $count = $stmt->rowCount();

        return $count;
    }

    // COUNT TOTAL VERIFIED / UNVERIFED USERS

    public function verified_users($status){
        $sql = "SELECT * FROM users WHERE verified = :status";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['status' => $status]);
        $count = $stmt->rowCount();

        return $count;
    }

    // GENDER PERCENTAGE

    public function genderPer(){
        $sql = "SELECT gender, COUNT(*) AS number FROM users WHERE gender != '' GROUP BY gender";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result; 
    }

    // VERIFIED/UNVUVERIFIED USERS PERCENTAGE
    public function verifiedPer(){
        $sql = "SELECT verified, COUNT(*) AS number FROM users GROUP BY verified";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result; 

    }

     public function site_hits(){
        $sql = "SELECT hits FROM visitors";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $count = $stmt->fetch(PDO::FETCH_ASSOC);
        return $count; 

    }

    // FETCH ALL REGISTERED USERS 
    public function fetchAllUsers($val){
        $sql = "SELECT * FROM users WHERE deleted != $val";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result; 

    }

    // FETCH USERS DETAIL'S ID

    public function fetchUsersDetailsById($id) {
        $sql = "SELECT * FROM users WHERE id =:id AND deleted != 0";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result; 
    }
    
// delete note
    public function userAction($id, $val) {
        $sql = "UPDATE users SET deleted = $val WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id'=>$id]);

        return true;
    }

    public function fetchAllNotes(){
        $sql = "SELECT notes.id, notes.title, notes.note, notes.created_at,
     notes.updated_at, users.name, users.email FROM notes INNER JOIN users ON notes.uid = users.id";
     $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;

    }

    // delete note
    public function deleteNoteOfUser($id) {
        $sql = "DELETE FROM notes WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id'=>$id]);

        return true;
    }

    // FETCH ALL USER FEEDBACK
    public function fetchAllFeedback(){
        $sql = "SELECT feedback.id, feedback.subject, feedback.feedback, feedback.created_at,
     feedback.uid, users.name, users.email FROM feedback INNER JOIN users ON feedback.uid = users.id WHERE replied !=1 ORDER BY feedback.id DESC";
     $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;

    }

    // EXPORT ALL USERS in DB
    public function exportAllUsers(){
        $sql = "SELECT * FROM users";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result; 

    }
    

}

?>
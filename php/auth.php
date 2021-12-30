<?php 

require_once 'config.php';
class Auth extends Database {
    public function register($name, $email, $password ) {
        $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :pass )";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['name'=>$name, 'email'=>$email, 'pass'=>$password]);

        return true;
    }

    // checking users already exists

    public function user_exist($email) {
        $sql = "SELECT email FROM users WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['email'=>$email]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    // LOGIN EXISTING USER

    public function login($email) {
        $sql = "SELECT email, password FROM users WHERE email = :email AND deleted != 0";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['email'=>$email]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row;
    }

    // CURRENT USER IN SESSION

    public function currentUser($email) {
        $sql = "SELECT * FROM users WHERE email = :email AND deleted != 0";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['email'=>$email]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row;
    }

    // FORGOT PASSWORD

    public function forgot_password($token, $email) {
        $sql = "UPDATE users SET token = :token, token_expire = DATE_ADD(NOW(), INTERVAL 10 MINUTE) WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['token'=>$token, 'email'=>$email]);

        return true;
    }

    // ADD NEW NOTE

    public function add_new_note($uid, $title, $note) {
        $sql = "INSERT INTO notes (uid, title, note) VALUES (:uid, :title, :note)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['uid'=>$uid, 'title'=>$title, 'note'=>$note]);

        return true;

    }

    // GET ALL USERS NOTE
    public function get_notes($uid) {
        $sql = "SELECT * FROM notes WHERE uid = :uid ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['uid'=>$uid]);
        
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    // GET THE CURRENT NOTE OF AN USER
    public function edit_note($id) {
    $sql = "SELECT * FROM notes WHERE id = :id ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id'=>$id]);
        
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    // UPDATE USER NOTE IN DATABASE

public function update_note($id, $title, $note) {
    $sql = "UPDATE notes SET title = :title, note = :note, updated_at = NOW() WHERE id =:id";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['title'=>$title, 'note'=>$note, 'id'=>$id]);

    return true;
}
// delete note
public function delete_note($id) {
    $sql = "DELETE FROM notes WHERE id = :id ";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['id'=>$id]);

    return true;

}

// NOTE INFO 

public function note_info($id) {
    $sql = "SELECT * FROM notes WHERE id = :id ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id'=>$id]);
        
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
}

// UPDATE AN USER PROFILE

public function update_profile($name, $gender, $dob, $phone, $photo, $id) {
    $sql = "UPDATE users SET name = :name, gender = :gender, dob = :dob, phone = :phone, photo = :photo WHERE id =:id AND deleted != 0";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['name'=>$name, 'gender'=>$gender, 'dob'=>$dob, 'phone'=>$phone, 'photo'=>$photo, 'id'=>$id]);

    return true;
}

// EDIT AN USER PASSWORD 
public function change_password($pass, $id) {
    $sql = "UPDATE users SET password =:pass WHERE id =:id AND deleted != 0";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['pass'=>$pass, 'id'=>$id]);

    return true;
}

// FEEDBACK

public function send_feedback( $sub, $feed, $uid) {
        $sql = "INSERT INTO feedback (uid, subject, feedback) VALUES (:uid, :sub, :feed)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['uid'=>$uid, 'sub'=>$sub, 'feed'=>$feed]);

        return true;

    }


    // INSERT NOTIFICATION 

    public function notification( $uid, $type, $message) {
        $sql = "INSERT INTO notification (uid, type, message) VALUES (:uid, :type, :message)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['uid'=>$uid, 'type'=>$type, 'message'=>$message]);

        return true;

    }
    // FETCH NOTIFICATION 

    public function fetchNotification($uid) {
    $sql = "SELECT * FROM notification WHERE uid = :uid AND type = 'user' ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['uid'=>$uid]);
        
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
}




}

?>
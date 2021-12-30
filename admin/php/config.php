<?php 

class Database{

    // const USERNAME = 'jonnydcoder@gmail.com';
    // const PASSWORD = '12345678';

    private $dsn = "mysql:host=localhost;dbname=db_user_system";
    private $dbuser = "root";
    private $dbpass = "";

    public $conn;

    public function __construct(){
        try {
            $this->conn= new PDO($this->dsn,$this->dbuser,$this->dbpass);

            // echo 'Connected to Database Successfully';
        } catch (PDOException $e) {
            echo 'Error : '.$e->getMessage();
        }

        return $this->conn;

    }

    //CHECKING INPUT

    public function test_input($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }

    // SHOW MESSAGE
    public function showMessage($type, $message) {
        return '<div class="alert alert-' .$type.' alert-dismissible show fadeIn" >
                <button type="button" class="close"
                data-dismiss="alert" aria-label="btn-close"></button>
                <strong class="text-center">'.$message.'</strong>
                </div>';
    }
}

$ob = new Database();

?>
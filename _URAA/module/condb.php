<?php
class conuraa
{
    protected $conn = null;
    public function Open()
    {
        try {

            $dbserver = "mysql:dbname=orakel; host=localhost";
            $username = "root";
            $password = "";

            $options = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            );

            $this->conn = new PDO($dbserver, $username, $password, $options);
            return $this->conn;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function Close()
    {
        $this->conn = null;
    }
}

$uraa = new conuraa();
$conn = $uraa->Open();


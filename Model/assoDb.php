<?php


class assoDb
{
    private string $server;
    private string $db;
    private string $user;
    private string $password;

    /**
     * DbChat constructor.
     */
    public function __construct() {
        $this->server ='localhost';
        $this->db = 'assomaker';
        $this->user = 'root';
        $this->password = '';
    }

    public function connect(): ?PDO
    {
        try {
            $pdo = new PDO ("mysql:host=$this->server;dbname=$this->db;charset=utf8", $this->user, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $pdo;
        }
        catch (PDOException $e) {
            echo "Error : " . $e->getMessage();
            return null;
        }
    }

}

<?php


class technicManager {
    private PDO $pdo;

    public function __construct ($pdo) {
        $this->pdo = $pdo;
    }

    /**
     * @param int $id_tech
     * @param string $technic
     * @return bool
     */
    public function addTechnic (int $id_tech, string $technic) {
        $sql = $this->pdo->prepare("INSERT INTO technic (id_tech, technic) VALUES (':id_tech', ':technic')");
        $sql->bindValue(':id_tech', $id_tech, PDO::PARAM_INT);
        $sql->bindValue(':technic', $technic);
        $sql->execute();
        return $this->pdo->lastInsertId() !== 0;
    }

    /**
     * @param $id
     * @return Technic
     */
    public function getOneTechnic ($id) {
        $sql = $this->pdo->prepare("SELECT * FROM technic WHERE id_tech = :id");
        $sql->bindValue(':id', $id, PDO::PARAM_INT);
        $sql->execute();
        $result = $sql->fetch();
        $technic = new Technic();
        if($result){
            $technic->setIdTech($result['id_tech']);
            $technic->setTechnic($technic['technic']);
        }
        return $technic;
    }

    /**
     * @return array
     */
    public function getAllTechnics() : array {
        $technics = [];
        $sql = $this->pdo->prepare("SELECT * FROM technic");
        $sql->execute();
        $result = $sql->fetchAll();
        if($result){
            foreach ($result as $technic){
                $technics[] = new Technic($technic['id_technic'], $technic['technic']);
            }
        }
        return $technics;
    }
}

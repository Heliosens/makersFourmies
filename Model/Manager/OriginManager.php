<?php


class OriginManager {
    private PDO $pdo;

    public function __construct ($pdo) {
        $this->pdo = $pdo;
    }

    public function getOneOrigin ($id) :Origin {
        $sql = $this->pdo->prepare("SELECT * FROM origin WHERE id_org = :id");
        $sql->bindValue(':id', $id, PDO::PARAM_INT);
        $sql->execute();
        $result = $sql->fetch();
        $origin = new Origin();
        if($result){
            $origin->setIdOrg($result['id_org']);
            $origin->setOrigin($result['origin']);
        }
        return $origin;
    }

    public function getAllOrigin () : array {
        $origins = [];
        $sql = $this->pdo->prepare("SELECT * FROM origin");
        $sql->execute();
        $result = $sql->fetchAll();
        if($result){
            foreach ($result as $origin){
                $origins[] = new Origin($origin['id_org'], $origin['origin']);
            }
        }
        return $origins;
    }

}
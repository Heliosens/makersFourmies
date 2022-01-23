<?php


class roleManager {
    private PDO $pdo;

    public function __construct ($pdo){
        $this->pdo = $pdo;
    }

    /**
     * @param int $id_role
     * @param string $role
     * @return bool
     */
    public function addRole (int $id_role, string $role) {
        $sql = $this->pdo->prepare("INSERT INTO role (id_role, role) VALUES (':id_role', ':role')");
        $sql->bindValue(':id_role', $id_role, PDO::PARAM_INT);
        $sql->bindValue(':role', $role);
        $sql->execute();
        return $this->pdo->lastInsertId() !== 0;
    }

    /**
     * @param $id
     * @return Role
     */
    public function getOneRole ($id) {
        $sql = $this->pdo->prepare("SELECT * FROM role WHERE id_role = :id");
        $sql->bindValue(':id', $id, PDO::PARAM_INT);
        $sql->execute();
        $result = $sql->fetch();
        $role = new Role();
        if($result){
            $role->setIdRole($result['id_role']);
            $role->setRole($result['role']);
        }
        return $role;
    }

    /**
     * @return array
     */
    public function getAllRoles() : array {
        $roles = [];
        $sql = $this->pdo->prepare("SELECT * FROM role");
        $sql->execute();
        $result = $sql->fetchAll();
        if($result){
            foreach ($result as $role) {
                $roles[] = new Role($role['id_role'], $role['role']);
            }
        }
        return $roles;
    }
}

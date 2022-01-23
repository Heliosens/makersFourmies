<?php


class UserManager {
    private PDO $pdo;

    /**
     * UserManager constructor.
     * @param $pdo
     */
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    /**
     * add user in data base
     * @param $name
     * @param $surname
     * @param $mail
     * @param $pseudo
     * @param $password
     * @return bool
     */
    public function addUser ($name, $surname, $mail, $pseudo, $password){
        $sql = $this->pdo->prepare("
            INSERT INTO user (name, surname, mail, pseudo, password)
            VALUES (:name, :surname, :pseudo, :mail, :password)
        ");
        $sql->bindValue(":name", $name);
        $sql->bindValue(":surname", $surname);
        $sql->bindValue(":mail", $mail);
        $sql->bindValue(":pseudo", $pseudo);
        $sql->bindValue(":password", $password);
        $sql->execute();
        return $this->pdo->lastInsertId() !== 0 ;
    }

    /**
     * get one user instance by id
     * @param $id
     * @return User
     */
    public function getOneUser ($id) : User {
        $sql = $this->pdo->prepare("SELECT * FROM user WHERE id_user = :id");
        $sql->bindValue(':id', $id, PDO::PARAM_INT);
        $sql->execute();
        $result = $sql->fetch();
        $user = new User();
        if($result){
            $user->setIdUser($result['id_user']);
            $user->setName($result['name']);
            $user->setSurname($result['surname']);
            $user->setMail($result['mail']);
            $user->setPseudo($result['pseudo']);
            $user->setPassword($result['password']);
        }
        return $user;
    }

    /**
     * get one user instance by mail
     * @param $mail
     * @return User
     */
    public function getUserByMail ($mail) : User {
        $sql = $this->pdo->prepare("SELECT * FROM user WHERE mail = :mail");
        $sql->bindValue(':mail', $mail, PDO::PARAM_STR);
        $sql->execute();
        $result = $sql->fetch();
        $user = new User();
        if($result){
            $user->setIdUser($result['id_user']);
            $user->setName($result['name']);
            $user->setSurname($result['surname']);
            $user->setMail($result['mail']);
            $user->setPseudo($result['pseudo']);
            $user->setPassword($result['password']);
            $user->setRoleFk($result['role_fk']);
        }
        return $user;
    }

    /**
     * get all user in array
     * @return array
     */
    public function getAllUsers() : array {
        $users = [];
        $sql = $this->pdo->prepare("SELECT * FROM user");
        $sql->execute();
        $result = $sql->fetchAll();
        if($result){
            foreach ($result as $user){
                $users[] = new User($user['id_user'], $user['name'], $user['surname'], $user['mail'],
                    $user['pseudo'], $user['password']);
            }
        }
        return $users;
    }

    /**
     * @param $ref
     * column to check between pseudo or mail
     *
     * @param $data
     * data to find
     * @return bool
     */
    public function testExist($ref, $data) : bool {
        $sql = 0;
        switch ($ref){
            case 'pseudo' :
                $sql = $this->pdo->prepare("SELECT * FROM user WHERE pseudo = :pseudo");
                $sql->bindValue(':pseudo', $data);
                break;
            case 'mail' :
                $sql = $this->pdo->prepare("SELECT * FROM user WHERE mail = :mail");
                $sql->bindValue(':mail', $data);
                break;
        }
        $sql->execute();
        return $sql->fetch() ? true : false;
    }

    /**
     * compose profile
     */

}

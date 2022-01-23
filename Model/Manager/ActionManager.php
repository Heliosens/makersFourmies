<?php


class ActionManager {
    private PDO $pdo;
    private TypeManager $typeManager;

    /**
     * ActionManager constructor.
     * @param $pdo
     */
    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->typeManager = new TypeManager($this->pdo);
    }

    /**
     * create new action in database
     * @param string $title
     * @param string $description
     * @param $date
     * @param int $type_fk
     * @return string
     */
    public function addAction(string $title, string $description, $date, int $type_fk) {
        $sql = $this->pdo->prepare("
            INSERT INTO action (title, description, date, type_fk)
            VALUES (:title, :description, :date, :type_fk)
        ");
        $sql->bindValue(':title', trim(strip_tags($title)));
        $sql->bindValue(':description', trim(strip_tags($description)));
        $sql->bindValue(':date', $date);
        $sql->bindValue('type_fk', $type_fk, PDO::PARAM_INT);
        $sql->execute();
        return $this->pdo->lastInsertId() !== 0 ;
    }

    // todo find all informations about action for one action view
    // select project-title, description, date, user-pseudo, technic- , tool-, matter-.

    /**
     * get action by id
     * @param $id
     * @return Action
     */
    public function getOneAction($id) : Action {
        $sql = $this->pdo->prepare("SELECT * FROM action WHERE id_act = :id");
        $sql->bindValue(':id', $id, PDO::PARAM_INT);
        $sql->execute();
        $result = $sql->fetch();
        $action = new Action();
        if($result){
            $action->setIdAct($result['id_act']);
            $action->setTitle($result['title']);
            $action->setDescription($result['description']);
            $action->setDate($result['date']);
            $type = $this->typeManager->getOneType($result['type_fk']);
            $action->setType($type);
        }
        return $action;
    }

    /**
     * get all actions
     * @return array
     */
    public function getAllActions() : array {
        $actions = [];
        $sql = $this->pdo->prepare("SELECT * FROM action");
        $sql->execute();
        $result = $sql->fetchAll();

        if($result){
            foreach ($result as $action) {
                $type = $this->typeManager->getOneType($action['type_fk']);
                $actions[] = new Action($action['id_act'], $action['title'], $action['description'], $action['date'], $type);
            }
        }
        return $actions;
    }
}

<?php


class toolManager {
    private PDO $pdo;

    public function __construct ($pdo){
        $this->pdo = $pdo;
    }

    /**
     * @param int $id_tool
     * @param string $tool
     * @return bool
     */
    public function addTool (int $id_tool, string $tool){
        $sql = $this->pdo->prepare("INSERT INTO tool (id_tool, tool) VALUES (':id_tool', ':tool')");
        $sql->bindValue(':id_tool', $id_tool, PDO::PARAM_INT);
        $sql->bindValue(':technic', $tool);
        $sql->execute();
        return $this->pdo->lastInsertId() !==0;
    }

    /**
     * @param $id
     * @return Tool
     */
    public function getOneTool ($id) {
        $sql = $this->pdo->prepare("SELECT * FROM tool WHERE id_tool = :id");
        $sql->bindValue(':id', $id, PDO::PARAM_INT);
        $sql->execute();
        $result = $sql->fetch();
        $tool = new Tool();
        if($result){
            $tool->setIdTool($result['id_tool']);
            $tool->setTool($result['tool']);
        }
        return $tool;
    }

    public function getAllTools() : array {
        $tools = [];
        $sql = $this->pdo->prepare("SELECT * FROM tool");
        $sql->execute();
        $result = $sql->fetchAll();
        if($result){
            foreach ($result as $tool) {
                $tools[] = new Tool($tool['id_tool'], $tool['tool']);
            }
        }
        return $tools;
    }
}

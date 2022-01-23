<?php


class ArticleManager {
    private PDO $pdo;
    private UserManager $userManager;

    /**
     * ArticleManager constructor.
     * @param $pdo
     */
    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->userManager = new UserManager($this->pdo);
    }

    /**
     * @param string $title_art
     * @param string $article
     * @param int $user_fk
     * @param $date
     * @return bool
     */
    public function addArticle(string $title_art, string $article, int $user_fk, $date){
        $sql = $this->pdo->prepare("
            INSERT INTO article (title_art, article, user_fk, date)
            VALUES (:title_art, :article, :user_fk, :date)
            ");
        $sql->bindValue(':title_art', $title_art);
        $sql->bindValue(':article', $article);
        $sql->bindValue(':user_fk', $user_fk);
        $sql->bindValue(':date', $date);
        $sql->execute();
        return $this->pdo->lastInsertId() !==0 ;
    }

    /**
     * @return array
     */
    public function getAllArticles(){
        $articles = [];
        $sql = $this->pdo->prepare("SELECT * FROM article");
        $sql->execute();
        $result = $sql->fetchAll();
        if($result){
            foreach ($result as $item){
                $user = $this->userManager->getOneUser($item['user_fk']);
                $articles[] = new Article(null, $item['title_art'], $item['article'], $user, $item['date']);
            }
        }
        return $articles;
    }
}
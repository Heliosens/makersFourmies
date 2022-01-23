<?php


class partsController extends controller {
    private PDO $pdo;
    private ImageManager $imageManager;
    private ActionManager $actionManager;
    private ArticleManager $articleManager;

    /**
     * partsController constructor.
     * @param PDO $pdo
     */
    public function __construct (PDO $pdo) {
        $this->pdo = $pdo;
        $this->articleManager = new ArticleManager($this->pdo);
        $this->imageManager = new ImageManager($this->pdo);
        $this->actionManager = new ActionManager($this->pdo);
    }

    /**
     * @return array
     */
    public function displayImage() {
        return $this->imageManager->getAllImages();
    }

    /**
     * @return array
     */
    public function displayAction() {
        return $this->actionManager->getAllActions();
    }

    /**
     * @return array
     */
    public function displayArticle() {
        return $this->articleManager->getAllArticles();
    }

}
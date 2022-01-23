<?php


class ImageManager {
    private PDO $pdo;

    /**
     * ImageManager constructor.
     * @param $pdo
     */
    public function __construct ($pdo){
        $this->pdo = $pdo;
    }

    /**
     * @param string $title
     * @param string $image
     * @return bool
     */
    public function addImage(string $title, string $image){
        $sql = $this->pdo->prepare("
            INSERT INTO image (image_title, image)
            VALUES (:image_title, :image)
            ");
        $sql->bindValue(':image_title', $title);
        $sql->bindValue(':image', $image);
        $sql->execute();
        return $this->pdo->lastInsertId() !==0 ;
    }

    /**
     * get image by id
     * @param $id
     * @return Image
     */
    public function getOneImage($id) : Image {
        $sql = $this->pdo->prepare("SELECT * FROM image WHERE id_img = :id");
        $sql->bindValue(':id', $id, PDO::PARAM_INT);
        $sql->execute();
        $result = $sql->fetch();
        $image = new Image();
        if($result){
            $image->setIdImg($result['id_img']);
            $image->setImageTitle($result['image_title']);
            $image->setImage($result['image']);
        }
        return $image;
    }

    /**
     * find all images from database
     * @return array
     */
    public function getAllImages () : array {
        $images = [];
        $sql = $this->pdo->prepare("SELECT * FROM image");
        $sql->execute();
        $result = $sql->fetchAll();
        if($result){
            foreach ($result as $image) {
                $images[] = new Image(null, $image['image_title'], $image['image']);
            }
        }
        return $images;
    }
}
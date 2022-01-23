<?php


class Image {
    private ?int $id_img;
    private ?string $image_title;
    private ?string $image;
    private ?Action $action;

    public function __construct( ?int $id_img = null, ?string $image_title = null, ?string $image = null, ?Action $action = null){
        $this->id_img = $id_img;
        $this->image_title = $image_title;
        $this->image = $image;
        $this->action = $action;
    }

    /**
     * @return int|null
     */
    public function getIdImg(): ?int
    {
        return $this->id_img;
    }

    /**
     * @param int|null $id_img
     */
    public function setIdImg(?int $id_img): void
    {
        $this->id_img = $id_img;
    }

    /**
     * @return string|null
     */
    public function getImageTitle(): ?string
    {
        return $this->image_title;
    }

    /**
     * @param string|null $image_title
     */
    public function setImageTitle(?string $image_title): void
    {
        $this->image_title = $image_title;
    }

    /**
     * @return string|null
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * @param string|null $image
     */
    public function setImage(?string $image): void
    {
        $this->image = $image;
    }

    /**
     * @return Action|null
     */
    public function getAction(): ?Action
    {
        return $this->action;
    }

    /**
     * @param Action|null $action
     */
    public function setAction(?Action $action): void
    {
        $this->action = $action;
    }

}
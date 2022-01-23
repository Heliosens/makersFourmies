<?php


class Article{
    private ?int $id_article;
    private ?string $title_art;
    private ?string $article;
    private ?User $user;
    private ?string $date;

    public function __construct(?int $id_article = null, ?string $title_art = null,
                                ?string $article = null, ?User $user = null, ?string $date = null){
        $this->id_article = $id_article;
        $this->title_art = $title_art;
        $this->article = $article;
        $this->user = $user;
        $this->date = $date;
    }

    /**
     * @return int|null
     */
    public function getIdArticle(): ?int
    {
        return $this->id_article;
    }

    /**
     * @param int|null $id_article
     */
    public function setIdArticle(?int $id_article): void
    {
        $this->id_article = $id_article;
    }

    /**
     * @return string|null
     */
    public function getTitleArt(): ?string
    {
        return $this->title_art;
    }

    /**
     * @param string|null $title_art
     */
    public function setTitleArt(?string $title_art): void
    {
        $this->title_art = $title_art;
    }

    /**
     * @return string|null
     */
    public function getArticle(): ?string
    {
        return $this->article;
    }

    /**
     * @param string|null $article
     */
    public function setArticle(?string $article): void
    {
        $this->article = $article;
    }

    /**
     * @return User|null
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

    /**
     * @param User|null $user
     */
    public function setUser(?User $user): void
    {
        $this->user = $user;
    }

    /**
     * @return string|null
     */
    public function getDate(): ?string
    {
        return $this->date;
    }

    /**
     * @param string|null $date
     */
    public function setDate(?string $date): void
    {
        $this->date = $date;
    }


}
<?php


class Action {
    private ?int $id_act;
    private ?string $title;
    private ?string $description;
    // starting date
    private ?string $date;
    private ?Type $type;

    public function __construct(?int $id_act = null, ?string $title=null, ?string $description = null,
                                ?string $date = null, ?Type $type = null){
        $this->id_act = $id_act;
        $this->title = $title;
        $this->description = $description;
        $this->date = $date;
        $this->type = $type;
    }

    /**
     * @return int|null
     */
    public function getIdAct(): ?int
    {
        return $this->id_act;
    }

    /**
     * @param int|null $id_act
     */
    public function setIdAct(?int $id_act): void
    {
        $this->id_act = $id_act;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     */
    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
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

    /**
     * @return Type|null
     */
    public function getType(): ?Type
    {
        return $this->type;
    }

    /**
     * @param Type|null $type
     */
    public function setType(?Type $type): void
    {
        $this->type = $type;
    }



}
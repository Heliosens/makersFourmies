<?php


class Type {
    private ?int $id_type;
    private ?string $type;

    public function __construct(?int $id_type = null, ?string $type = null){
        $this->id_type = $id_type;
        $this->type = $type;
    }

    /**
     * @return int|null
     */
    public function getIdType(): ?int
    {
        return $this->id_type;
    }

    /**
     * @param int|null $id_type
     */
    public function setIdType(?int $id_type): void
    {
        $this->id_type = $id_type;
    }

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string|null $type
     */
    public function setType(?string $type): void
    {
        $this->type = $type;
    }


}
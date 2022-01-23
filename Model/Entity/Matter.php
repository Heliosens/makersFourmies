<?php


class Matter {
    private ?int $id_matter;
    private ?string $matter;
    private ?string $origin;

    public function __construct(?int $id_matter = null, ?string $matter = null, ?string $origin = null){
        $this->id_matter = $id_matter;
        $this->matter = $matter;
        $this->origin = $origin;
    }

    /**
     * @return int|null
     */
    public function getIdMatter(): ?int
    {
        return $this->id_matter;
    }

    /**
     * @param int|null $id_matter
     */
    public function setIdMatter(?int $id_matter): void
    {
        $this->id_matter = $id_matter;
    }

    /**
     * @return string|null
     */
    public function getMatter(): ?string
    {
        return $this->matter;
    }

    /**
     * @param string|null $matter
     */
    public function setMatter(?string $matter): void
    {
        $this->matter = $matter;
    }

    /**
     * @return string|null
     */
    public function getOrigin()
    {
        return $this->origin;
    }

    /**
     * @param string|null $origin
     */
    public function setOrigin($origin): void
    {
        $this->origin = $origin;
    }

}
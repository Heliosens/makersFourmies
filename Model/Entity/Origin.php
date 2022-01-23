<?php


class Origin {
    private ?int $id_org;
    private ?string $origin;

    public function __construct(?int $id_org = null, ?string $origin = null){
        $this->id_org = $id_org;
        $this->origin = $origin;
    }

    /**
     * @return int|null
     */
    public function getIdOrg(): ?int
    {
        return $this->id_org;
    }

    /**
     * @param int|null $id_org
     */
    public function setIdOrg(?int $id_org): void
    {
        $this->id_org = $id_org;
    }

    /**
     * @return string|null
     */
    public function getOrigin(): ?string
    {
        return $this->origin;
    }

    /**
     * @param string|null $origin
     */
    public function setOrigin(?string $origin): void
    {
        $this->origin = $origin;
    }

}
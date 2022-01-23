<?php


class Role {
    private ?int $id_role;
    private ?string $role;

    public function __construct(?int $id_role = null, ?string $role = null){
        $this->id_role = $id_role;
        $this->role = $role;
    }

    /**
     * @return int|null
     */
    public function getIdRole(): ?int
    {
        return $this->id_role;
    }

    /**
     * @param int|null $id_role
     */
    public function setIdRole(?int $id_role): void
    {
        $this->id_role = $id_role;
    }

    /**
     * @return string|null
     */
    public function getRole(): ?string
    {
        return $this->role;
    }

    /**
     * @param string|null $role
     */
    public function setRole(?string $role): void
    {
        $this->role = $role;
    }

}
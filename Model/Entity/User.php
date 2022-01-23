<?php


class User {
    private ?int $id_user;
    private ?string $name;
    private ?string $surname;
    private ?string $mail;
    private ?string $pseudo;
    private ?string $password;
    private ?int $date;
    private ?int $role_fk;

    public function __construct(?int $id_user = null, ?string $name = null, ?string $surname = null, ?string $mail = null, ?string $pseudo = null,
                                ?string $password = null, ?int $date = null, ?int $role_fk = 4){
        $this->id_user = $id_user;
        $this->name = $name;
        $this->surname = $surname;
        $this->mail = $mail;
        $this->pseudo = $pseudo;
        $this->password = $password;
        $this->date = $date;
        $this->role_fk = $role_fk;
    }

    /**
     * @return int|null
     */
    public function getIdUser(): ?int
    {
        return $this->id_user;
    }

    /**
     * @param int|null $id_user
     */
    public function setIdUser(?int $id_user): void
    {
        $this->id_user = $id_user;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     */
    public function getSurname(): ?string
    {
        return $this->surname;
    }

    /**
     * @param string|null $surname
     */
    public function setSurname(?string $surname): void
    {
        $this->surname = $surname;
    }

    /**
     * @return string|null
     */
    public function getMail(): ?string
    {
        return $this->mail;
    }

    /**
     * @param string|null $mail
     */
    public function setMail(?string $mail): void
    {
        $this->mail = $mail;
    }

    /**
     * @return string|null
     */
    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    /**
     * @param string|null $pseudo
     */
    public function setPseudo(?string $pseudo): void
    {
        $this->pseudo = $pseudo;
    }

    /**
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @param string|null $password
     */
    public function setPassword(?string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return int|null
     */
    public function getDate(): ?int
    {
        return $this->date;
    }

    /**
     * @param int|null $date
     */
    public function setDate(?int $date): void
    {
        $this->date = $date;
    }

    /**
     * @return int|null
     */
    public function getRoleFk(): ?int
    {
        return $this->role_fk;
    }

    /**
     * @param int|null $role_fk
     */
    public function setRoleFk(?int $role_fk): void
    {
        $this->role_fk = $role_fk;
    }

}
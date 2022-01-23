<?php


class Tool {
    private ?int $id_tool;
    private ?string $tool;

    public function __construct(?int $id_tool = null, ?string $tool = null) {
        $this->id_tool = $id_tool;
        $this->tool = $tool;
    }

    /**
     * @return int|null
     */
    public function getIdTool(): ?int
    {
        return $this->id_tool;
    }

    /**
     * @param int|null $id_tool
     */
    public function setIdTool(?int $id_tool): void
    {
        $this->id_tool = $id_tool;
    }

    /**
     * @return string
     */
    public function getTool(): string
    {
        return $this->tool;
    }

    /**
     * @param string $tool
     */
    public function setTool(string $tool): void
    {
        $this->tool = $tool;
    }
}
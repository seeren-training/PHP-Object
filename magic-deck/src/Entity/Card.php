<?php


namespace MagicDeck\Entity;


class Card
{

    private int $id;

    private string $manaCost;

    private string $type;

    private string $name;

    private string $description;

    private string $image;

    private array $colorList;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getManaCost(): string
    {
        return $this->manaCost;
    }

    /**
     * @param string $manaCost
     */
    public function setManaCost(string $manaCost): void
    {
        $this->manaCost = $manaCost;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage(string $image): void
    {
        $this->image = $image;
    }

    /**
     * @return array
     */
    public function getColorList(): array
    {
        return $this->colorList;
    }

    /**
     * @param array $colorList
     */
    public function setColorList(array $colorList): void
    {
        $this->colorList = $colorList;
    }

}

<?php

class Items
{
    private int $id_items;
    private string $nom_item;
    private string $id_heroes;

    public function __construct($id, $nom_object, $id_heroes)
    {
        $this->id_items = $id;
        $this->nom_item = $nom_object;
        $this->id_heroes = $id_heroes;
    }



    /**
     * Get the value of id_items
     */
    public function getId_items()
    {
        return $this->id_items;
    }

    /**
     * Set the value of id_items
     *
     * @return  self
     */
    public function setId_items($id_items)
    {
        $this->id_items = $id_items;

        return $this;
    }

    /**
     * Get the value of nom_item
     */
    public function getNom_item()
    {
        return $this->nom_item;
    }

    /**
     * Set the value of nom_item
     *
     * @return  self
     */
    public function setNom_item($nom_item)
    {
        $this->nom_item = $nom_item;

        return $this;
    }

    /**
     * Get the value of id_heroes
     */
    public function getId_heroes()
    {
        return $this->id_heroes;
    }

    /**
     * Set the value of id_heroes
     *
     * @return  self
     */
    public function setId_heroes($id_heroes)
    {
        $this->id_heroes = $id_heroes;

        return $this;
    }
}

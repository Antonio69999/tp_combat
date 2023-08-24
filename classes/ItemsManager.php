<?php

require_once 'Items.php';  // Inclure le modèle

class ItemsManager {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    /**
     * Get the value of db
     */ 
    public function getDb()
    {
        return $this->db;
    }

    /**
     * Set the value of db
     *
     * @return  self
     */ 
    public function setDb($db)
    {
        $this->db = $db;

        return $this;
    }

    public function addItems(Items $items)
    {
        $sql = $this->db->query(
            "INSERT INTO items (nom_item, id_heroes) 
             VALUES (:nom_item, :id_heroes)");
        $sql->bindValue('nom_item', $items->getNom_item());
        $sql->execute();

        $id = $this->db->lastInsertId();
        $items->setId_heroes($id);
    }
}

?>

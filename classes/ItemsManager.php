<?php

require_once 'Items.php';  // Inclure le modèle

class ItemsManager {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getItemsForHero($heroID) {
        $items = [];

        // Remplacer cette requête par la requête SQL pour obtenir les objets associés au héros
        $query = "SELECT id_items, nom_item FROM items WHERE id_heroes = :heroID";
        $result = $this->db->prepare($query);
        $result->bindParam(':heroID', $heroID, PDO::PARAM_INT);
        $result->execute();

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $item = new Items($row['id_items'], $row['nom_object'], $heroID);
            $items[] = $item;
        }

        return $items;
    }

    public function assignItemToHero($itemID, $heroID) {
        
    }
}

?>

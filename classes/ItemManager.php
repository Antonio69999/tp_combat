<?php

class   ItemManager
{
    private object $db;

    public function __construct(PDO $db)
    {
        $this->setDb($db);
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

    /**
     * Get the value of db
     */
    public function getDb()
    {
        return $this->db;
    }

    public function getAllItems()
    {
        $sql = "SELECT * FROM items";
        $result = $this->db->query($sql);
        $myItems = $result->fetchAll(PDO::FETCH_ASSOC);
        $itemArray = [];

        foreach ($myItems as $myItem) {
            $itemArray[] = new Item($myItem);
        }
        return $itemArray;
    }

    public function getOneItembyId($id)
    { {
            $query = "SELECT * FROM items WHERE id_items = :id";
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
            $itemData = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($itemData) {
                return new Item($itemData);
            }
        }
    }
}

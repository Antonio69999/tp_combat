<?php

class   HeroesManager
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

    public function addHero(Hero $hero)
    {
        $sql = $this->db->prepare("INSERT INTO heroes (name) VALUES (:name)");
        $sql->bindValue(':name', $hero->getName());
        $sql->execute();

        // get last registered id
        $id = $this->db->lastInsertId();
        $hero->setId_heroes($id);
    }

    public function findAllAlive()
    {
        $sql = "SELECT * FROM heroes WHERE health_point > 0";
        $result = $this->db->query($sql);
        $myHeroes = $result->fetchAll(PDO::FETCH_ASSOC);
        $heroe_array = [];

        foreach ($myHeroes as $myHeroe) {
            $heroe_array[] = new Hero($myHeroe);
        }
        return $heroe_array;
    }

    public function findHeroById(int $id_heroes)
    {
        $query = 'SELECT * FROM heroes WHERE id_heroes = :id_heroes';
        $result = $this->db->prepare($query);
        $heroId = $result->execute(['id_heroes' => $id_heroes]);
        $heroId = $result->fetch(PDO::FETCH_ASSOC);

        return new Hero($heroId, $this->getDb());
    }

    public function updataHero(Hero $hero)
    {
        $sql = "UPDATE heroes SET health_point = :health_point WHERE id_heroes = :id";
        $query = $this->db->prepare($sql);
        $query->bindValue(':id', $hero->getId_heroes());
        $query->bindValue(':health_point', $hero->getHealth_point());
        $query->execute();
    }

    public function associateItemWithHero($heroId, $itemId)
    {
        $sql = $this->db->prepare("UPDATE items SET id_heroes = :heroId WHERE id_items = :itemId");
        $sql->bindValue(':heroId', $heroId);
        $sql->bindValue(':itemId', $itemId);
        $sql->execute();
    }

    public function getItemsForHero($heroId)
    {
        $sql = "SELECT * FROM items WHERE id_heroes = :heroId";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':heroId', $heroId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    
}

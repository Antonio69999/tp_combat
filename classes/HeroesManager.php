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
        $hero->setId($id);
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

    public function findHeroById(int $id)


    {
        $query = 'SELECT * FROM heroes WHERE id = :idHeroes';
        $result = $this->db->prepare($query);
        $heroId = $result->execute(['idHeroes' => $_GET['id_heroes']]);
        $heroId = $result->fetch(PDO::FETCH_ASSOC);

        return new Hero($heroId, $this->getDb());
    }

    public function updataHero(Hero $hero)
    {
        $sql = "UPDATE heroes SET health_point = :health_point WHERE id = :id";
        
    }
}

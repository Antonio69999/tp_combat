<?php


class   Hero
{

    private int $id_heroes;
    private string $name;
    private int $health_point;

    public function __construct(array $array) 
    {
        if (isset ($array['id_heroes'])) {
            $this->setId_heroes($array['id_heroes']);
        }

        if (isset ($array['name'])) {
            $this->setName($array['name']);
        }
        if (isset ($array['health_point'])) {
            $this->setHealth_point($array['health_point']);
        }
    }


    //GETTER SETTER NAME//

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    //GETTER SETTER HP//


    public function getHealth_point()
    {
        return $this->health_point;
    }


    public function setHealth_point($health_point)
    {
        $this->health_point = $health_point;

        return $this;
    }

    //GETTER SETTER ID//

    /**
     * Get the value of id_hero
     */ 
    public function getId_heroes()
    {
        return $this->id_heroes;
    }

    /**
     * Set the value of id_hero
     *
     * @return  self
     */ 
    public function setId_heroes($id_heroes)
    {
        $this->id_heroes = $id_heroes;

        return $this;
    }


    public function hit(Monster $monster) : int
    {
        $damage = rand (0, 50);
        $monsterHealthPoint = $monster->getHealth_point();
        $monster->setHealth_point($monsterHealthPoint - $damage);

        return $damage;
    }
}

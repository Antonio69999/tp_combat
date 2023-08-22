<?php


class   Hero
{

    private int $id;
    private string $name;
    private int $health_point;

    public function __construct(array $array) 
    {
        if (isset ($array['id'])) {
            $this->setId($array['id']);
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


    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

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

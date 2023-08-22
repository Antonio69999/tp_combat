<?php


class   Hero
{

    private int $id;
    private string $name;
    private int $health_point = 100;

    public function __construct($name)
    {
        $this->name = $name;
        
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

    public function hit()
    {
        
    }
}

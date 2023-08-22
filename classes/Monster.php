<?php

    class Monster 
    {
        private string $name;
        private int $health_point;

        public function __construct (string $name, int $health_point) 
        {
            $this->name = $name;
            $this->health_point = $health_point;
        }

        /**
         * Get the value of name
         */ 
        public function getName()
        {
                return $this->name;
        }

        /**
         * Set the value of name
         *
         * @return  self
         */ 
        public function setName($name)
        {
                $this->name = $name;

                return $this;
        }

        /**
         * Get the value of health_point
         */ 
        public function getHealth_point()
        {
                return $this->health_point;
        }

        /**
         * Set the value of health_point
         *
         * @return  self
         */ 
        public function setHealth_point($health_point)
        {
                $this->health_point = $health_point;

                return $this;
        }

        public function hit(Hero $hero) : int
    {
        $damage = rand (0, 50);
        $heroHealthPoint = $hero->getHealth_point();
        $hero->setHealth_point($heroHealthPoint - $damage);

        return $damage;
    }
    }

?>
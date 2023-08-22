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
        }
    }
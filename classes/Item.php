<?php 

require_once('./config/autoload.php');
require_once('./config/db.php');

    class   Item {
        private int $id_items;
        private string $name;
        private $item_damage;

        public function __construct(array $item)
        {

            $this->id_items = $item['id_items'];
            $this->name = $item['nom_item'];
            $this->item_damage = $item['item_damage'] ?? 0;
        }

        /**
         * Get the value of id_items
         */ 
        public function getId_items()
        {
                return $this->id_items;
        }

        /**
         * Set the value of id_items
         *
         * @return  self
         */ 
        public function setId_items($id_items)
        {
                $this->id_items = $id_items;

                return $this;
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
         * Get the value of item_damage
         */ 
        public function getItem_damage()
        {
                return $this->item_damage;
        }

        /**
         * Set the value of item_damage
         *
         * @return  self
         */ 
        public function setItem_damage($item_damage)
        {
                $this->item_damage = $item_damage;

                return $this;
        }

   
}
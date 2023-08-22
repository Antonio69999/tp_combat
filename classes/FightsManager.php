<?php

class FightsManager
{
    public function createMonster($name, $health_point)
    {
        $monster = new Monster($name, $health_point);

        return $monster;
    }

    public function fight(Hero $hero, Monster $monster): array
    {
        $array = [];

        while ($hero->getHealth_point() > 0 && $monster->getHealth_point() > 0) {
           $damageMonster =  $monster->hit($hero);
            $array[] = 'The monster has hit the hero of ' . $damageMonster . ' health points <br>';
            if ($hero->getHealth_point() > 0) {
               $damageHero = $hero->hit($monster);
                $array[] = 'The hero has hit the monster of ' . $damageHero. ' health points <br>';
            }
        }

        return $array;

    }
}

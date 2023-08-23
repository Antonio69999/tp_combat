<?php

class FightsManager
{
    public function createMonster($name, $health_point, $monsterImage)
    {
        $monster = new Monster($name, $health_point, $monsterImage);

        return $monster;
    }

    public function fight(Hero $hero, Monster $monster): array
    {
        $array = [];

?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
        </head>

        <body>
            <div class="fight_log">
        <?php

        while ($hero->getHealth_point() > 0 && $monster->getHealth_point() > 0) {
            $damageMonster =  $monster->hit($hero);
            $array[] = 'The monster has hit the hero of ' . '<span class="damage">'. $damageMonster .'</span>'. ' health points <br>';
            if ($hero->getHealth_point() > 0) {
                $damageHero = $hero->hit($monster);
                $array[] = 'The hero has hit the monster of ' . '<span class="damage">'. $damageHero .'</span>'. ' health points <br>';
            }
        }

        return $array;
    }
}
        ?>
            </div>
        </body>

        </html>
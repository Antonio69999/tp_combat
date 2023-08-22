<?php

require_once('./config/autoload.php');
require_once('./config/db.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/main.css">
    <title>Combat</title>
</head>

<body>

    <!-- FORMULAIRE -->

    <div class="hero">
        <div>
            <form class="heroe__form" method="post">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" />
                <button type="submit">CREATE</button>
            </form>
            <?php
            $heroesManager = new HeroesManager($db);

            if (isset($_POST['name'])) {
                // $heroesManager = $_POST['name'];
                $hero = new Hero(['name', 'health_point']);
                $hero->setName($_POST['name']);
                $heroesManager->addHero($hero);
            }
            ?>
        </div>

        <div class="heroes_cards">
            <?php
            $heroeArray = $heroesManager->findAllAlive();
            foreach ($heroeArray as $hero) {
            ?>
            <div class="card"> 
            <?php echo $hero->getName() . '<br>' . $hero->getHealth_point(); ?>
            <form action="./fight.php" method="GET">
                <input type="hidden" name="id_heroes" value="<?php echo $hero->getId() ?>">
                <button type="submit">Chose</button>
            </form>
            </div>
  
            <?php
            }
            
            ?>
                                                                                                      
        </div>

    </div>
</body>

</html>
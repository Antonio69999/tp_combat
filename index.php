<?php

require_once('./config/autoload.php');
require_once('./config/db.php');
include('./functions/switch_case.php');


$heroesManager = new HeroesManager($db);
$itemManager = new ItemManager($db);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/main.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous"> -->
    <title>Combat</title>
</head>

<body>

    <!-- FORMULAIRE HERO -->
    <header class="header">
        <div class="form">
            <div>
                <h1><span>Who</span> Am <span>I</span> ?</h1>
                <form class="form_hero" method="post">
                    <input class="chosen-value" type="text" value="" id="name" name="name">
                    <ul class="value-list">
                        <li value="Isaac">Isaac</li>
                        <li value="Magdalene">Magdaleine</li>
                        <li value="Blue Baby">Blue Baby</li>
                        <li value="Judas">Judas</li>
                        <li value="Azazel">Azazel</li>
                        <li value="Lilith">Lilith</li>
                    </ul>

                    <!-- MY STUFF -->
                    <label for="itemSelect">
                        <h1>My stuff</h1>
                    </label>
                    <select name="selectedItem" id="itemSelect">
                        <?php
                        $itemArray = $itemManager->getAllItems();
                        foreach ($itemArray as $item) : ?>
                            <option value="<?php echo $item->getId_items(); ?>">
                                <?php echo $item->getName(); ?></option>
                        <?php endforeach; ?>
                    </select>

                    <input type="hidden" name="selectedItemId" value="">
                    <button class="chose" type="submit">Choose</button>
                </form>
            </div>
        </div>
        <div>
            <?php



            if (isset($_POST['name'])) {
                // $heroesManager = $_POST['name'];
                $hero = new Hero(['name', 'health_point']);
                $hero->setName($_POST['name']);

                if (isset($_POST['selectedItem'])) {
                    $selectedItemId = $_POST['selectedItem'];
                    $item = $itemManager->getOneItembyId($selectedItemId);

                    if ($item) {
                        echo "Select item : " . $item->getName();
                    }
                    else {
                        echo "Item not found";
                    }

                    $heroesManager->addHero($hero);
                    $heroesManager->associateItemWithHero($hero->getId_heroes(), $selectedItemId);
                }
            }
            
            ?>
        </div>
    </header>

    <div class="heroes_cards">
        <?php
        $heroeArray = $heroesManager->findAllAlive();
        foreach ($heroeArray as $hero) {
        ?>
            <div class="card">
                <?php $heroName = $hero->getName();
                switchCaseImage($heroName);
                echo $heroName . '<br>' . $hero->getHealth_point(); ?>
                <form action="./fight.php" method="GET">
                    <input type="hidden" name="id_heroes" value="<?php echo $hero->getId_heroes() ?>">
                    <button id="choose" type="submit">Choose</button>
                </form>
            </div>

        <?php
        }

        ?>

    </div>
</body>

<script src="./script/form.js"></script>

</html>
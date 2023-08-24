<?php

require_once('./config/autoload.php');
require_once('./config/db.php');
include('./functions/switch_case.php');

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
                <form class="form_hero" method="get">
                    <input class="chosen-value" type="text" value="" id="name" name="name">
                    <ul class="value-list">
                        <li value="Isaac">Isaac</li>
                        <li value="Magdalene">Magdalene</li>
                        <li value="Blue Baby">Blue Baby</li>
                        <li value="Judas">Judas</li>
                        <li value="Azazel">Azazel</li>
                        <li value="Lilith">Lilith</li>
                    </ul>
                    <button class="chose" type="submit">Choose</button>
                </form>
            </div>
        </div>

        <!-- FROMULAIRE ITEMS -->

        <div class="form">
            <div>
                <h1><span>My</span> stuff <span>?</span></h1>
                <form class="form_hero" method="post">
                    <label for="selectedItem"></label>
                    <select id="selectedItem" name="selectedItem">
                        <li value="Isaac">Isaac</li>
                        <option value="brimstone">Brimstone</option>
                        <option value="sacredheart">Sacred Heart</option>
                    </select>
                        <button class="chose" type="submit">Choose</button>
                </form>
            </div>
        </div>

        <div>
            <?php

            $heroesManager = new HeroesManager($db);
            $itemsManager = new ItemsManager($db);

            if (isset($_POST['name']) && $_POST[', ']) {
                // $heroesManager = $_POST['name'];
                $hero = new Hero(['name', 'health_point']);
                $hero->setName($_POST['name']);
                $heroesManager->addHero($hero);


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
<script src="./script/form_items.js"></script>

</html>
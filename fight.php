<?php
require_once('./config/autoload.php');
require_once('./config/db.php');
?>

<?php
$heroesManager = new HeroesManager($db);
$hero = $heroesManager->findHeroById($_GET["id_heroes"]);

$fightManager = new FightsManager;
$monster = $fightManager->createMonster('Gaper', 100);
$fightResults = $fightManager->fight($hero, $monster);

foreach ($fightResults as $result) {
    echo $result . "<br>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/main.css">
    <title>Fight</title>
</head>

<body>
    <div class="hero">
        <div class="card">
            <?php echo $hero->getName() ?> <br>
            <?php echo $hero->getHealth_point() ?>
        </div>
        <div class="card">
            <?php echo $monster->getName() ?> <br>
            <?php echo $monster->getHealth_point() ?>
        </div>
    </div>
</body>

</html>

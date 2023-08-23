<?php
require_once('./config/autoload.php');
require_once('./config/db.php');
include('./functions/switch_case.php');
?>

<?php
$heroesManager = new HeroesManager($db);
$hero = $heroesManager->findHeroById($_GET["id_heroes"]);

$fightManager = new FightsManager;
$monster = $fightManager->createMonster('Gaper', 100, './assets/gaper.png');
$fightResults = $fightManager->fight($hero, $monster);
$heroesManager->updataHero($hero);

foreach ($fightResults as $result) {
    
    echo '<div>' . $result . '</div>' . "<br>";
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
            <?php $heroName = $hero->getName();
            switchCaseImage($heroName);
            echo $heroName ?> <br>
            <?php echo $hero->getHealth_point() ?>
        </div>
        <div class="card">
            <img class="monster__gaper" src="<?php echo $monster->getMonsterImage() ?>">
            <?php echo $monster->getName() ?> <br>
            <?php echo $monster->getHealth_point() ?>
        </div>
        <button class="return_button"><a href="./index.php">Chose a Character !</a></button>
    </div>
</body>

</html>
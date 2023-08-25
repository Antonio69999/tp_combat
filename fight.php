<?php
require_once('./config/autoload.php');
require_once('./config/db.php');
include('./functions/switch_case.php');

$heroesManager = new HeroesManager($db);
$itemManager = new ItemManager($db);

$heroId = $_GET["id_heroes"];
$hero = $heroesManager->findHeroById($heroId);

// Check if item was selected and associated with hero
if (isset($_POST['selectedItemId'])) {
    $selectedItemId = $_POST['selectedItemId'];
    $item = $itemManager->getOneItembyId($selectedItemId);

    if ($item) {
        echo "Selected item: " . $item->getName();
    } else {
        echo "Item not found";
    }

    $heroesManager->associateItemWithHero($heroId, $selectedItemId);
}

$items = $heroesManager->getItemsForHero($hero->getId_heroes());

foreach ($items as $itemData) {
    $item = new Item($itemData);
    $hero->addItem($item);
}

$fightManager = new FightsManager;
$monster = $fightManager->createMonster('Gaper', 100, './assets/gaper.png');
$fightResults = $fightManager->fight($hero, $monster);
$heroesManager->updataHero($hero);

// Output fight results
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
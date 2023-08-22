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
        <form class="heroe__form" method="post">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" />
            <button type="submit">CREATE</button>
        </form>
        <?php
        if (isset($_POST['name'])) {
            $heroesManager = $_POST['name'];
            $heroesManager = new HeroesManager($db);
            $heroesManager->addHero(new Hero($_POST['name']));
        }
        ?>
    </div>
</body>

</html>
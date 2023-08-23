<?php
function switchCaseImage ($heroes_name) {
    
    switch ($heroes_name) {
        case 'Isaac': 
            echo '<img class="chara__isaac" src="../assets/isaac.png" alt="Isaac"/>';
            break;
        
        case 'Magdalene':
            echo '<img class="chara__magdalene" src="../assets/magdalene.png" alt="Magdalene" />';
            break;

        case 'Blue Baby':
            echo '<img class="chara__blue_baby" src="../assets/blue_baby.jpg" alt="Blue Baby" />';
            break;

        case 'Judas':
            echo '<img class="chara__judas" src="../assets/judas.png" alt="Juda" />';
            break;

        case 'Azazel':
            echo '<img class="chara__azazel" src="../assets/azazel.png" alt="Azazel" />';
            break;
        
        case 'Lilith':
            echo '<img class="chara__lilith" src="../assets/lilith.png" alt="Lilith" />';
            break;

}

}


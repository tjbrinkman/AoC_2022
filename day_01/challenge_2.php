<?php 

    $datafile = "challenge_1_data.txt";
    require('_read_food.php');

    $top3 = 0;

    for ($i=1; $i<4; $i++) {
        echo "Number $i : Elf = ".array_search(max($food), $food).", Calories = ".max($food)." \n";
        $top3 += max($food);
        $food[array_search(max($food), $food)] = 0;
    }

    echo "Total calories for the Top3 = $top3 \n";

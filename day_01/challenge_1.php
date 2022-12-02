<?php 

    $datafile = "challenge_1_data.txt";
    require('_read_food.php');

    echo "Maximum number of calories = ".max($food)."\n";
    echo "Elf with max-calories = ".array_search(max($food), $food)."\n";

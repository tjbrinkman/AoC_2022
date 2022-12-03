<?php 

    $datafile = "challenge_data.txt";
    require('_read_datafile.php');

    echo "Maximum number of calories = ".max($food)."\n";
    echo "Elf with max-calories = ".array_search(max($food), $food)."\n";


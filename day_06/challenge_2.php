<?php 

    $datafile = 'challenge_data.txt';
    require('_read_datafile.php');

    $x = 13; // cannot be start-marker before position 14
    $found = false;
    while ($found == false) {
        $found = count(array_unique(str_split(substr($data, $x-13, 14)))) == 14;
        $x++;
    }
    echo "First position after = $x \n";
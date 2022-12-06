<?php 

    $datafile = 'challenge_data.txt';
    require('_read_datafile.php');

    $x = 3; // cannot be start-marker before position 4
    $found = false;
    while ($found == false) {
        $found = count(array_unique(str_split(substr($data, $x-3, 4)))) == 4;
        $x++;
    }
    echo "First position after = $x \n";
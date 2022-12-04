<?php 

    $datafile = 'challenge_data.txt';
    require('_read_datafile.php');

    foreach($pairs as $pair)
        if ($pair[0][0] <= $pair[1][1] && $pair[1][0] <= $pair[0][1])
            @$overlap++;

    echo "Number of pairs where one assignment overlaps the other: $overlap \n";
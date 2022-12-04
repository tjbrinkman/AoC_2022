<?php 

    $datafile = 'challenge_data.txt';
    require('_read_datafile.php');

    function a_contains_b ($a, $b) {
        return ($a[0] <= $b[0] && $a[1] >= $b[1]); // a_start <= b_start && a_end <= b_end
    }

    foreach($pairs as $pair) 
        if (a_contains_b($pair[0], $pair[1]) || a_contains_b($pair[1], $pair[0])) // a_contains_b || b_contains_a
            @$contains++;

    echo "Number of pairs where one assignments fully contains the other: $contains \n";
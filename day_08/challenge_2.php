<?php 

    $datafile = 'data.txt';
    require('_read_datafile.php');

    function scenic_score($y, $x) {
        global $forest;
        // up
        $up = 0;
        $i = $y - 1;
        while ($i >= 0) {
            $up++;
            if ( $forest[$i][$x] >= $forest[$y][$x] ) break; 
            $i--;
        }
        // down
        $down = 0;
        $i = $y + 1;
        while ($i < count($forest)) {
            $down++;
            if ( $forest[$i][$x] >= $forest[$y][$x] ) break; 
            $i++;
        }
        // left
        $left = 0;
        $i = $x - 1;
        while ($i >= 0) {
            $left++;
            if ( $forest[$y][$i] >= $forest[$y][$x] ) break;
            $i--;
        }
        // right
        $right = 0;
        $i = $x + 1;
        while ($i < count($forest[0])) {
            $right++;
            if ( $forest[$y][$i] >= $forest[$y][$x] ) break;
            $i++;
        }
        return $up * $down * $right * $left;
    }

    $scenic = $forest;
    for ($y = 0; $y < count($forest); $y++) 
        for ($x = 0; $x < count($forest[$y]); $x++) 
            $scenic[$y][$x] = scenic_score($y, $x);

    // max
    $max = 0;
    for ($y = 0; $y < count($scenic); $y++)
        $max = max($max, max($scenic[$y]));
    
    echo "Highest scenic score = $max \n";
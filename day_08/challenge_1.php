<?php 

    $datafile = 'data.txt';
    require('_read_datafile.php');
    
    function tree_visible ($y, $x) {
    global $forest;
        // edges
        if ( $y == 0 || $y == count($forest)-1 || $x == 0 || $x == count($forest[0])-1 ) return true;
        // left
        $max = max(array_slice($forest[$y], 0, $x));
        if ($max < $forest[$y][$x]) return true;
        // Right
        $max = max(array_slice($forest[$y], $x+1));
        if ($max < $forest[$y][$x]) return true;
        // Down
        $max = 0;
        for ($i = $y+1; $i < count($forest); $i++) $max = max($max, (int)$forest[$i][$x]);
        if ($max < $forest[$y][$x]) return true;
        // Up
        $max = 0;
        for ($i = 0; $i < $y; $i++) $max = max($max, (int)$forest[$i][$x]);
        if ($max < $forest[$y][$x]) return true;
        // else
        return false;
    }

    // copy structure & analyze
    $visible = $forest;
    $visCount = 0;
    for ($y = 0; $y < count($forest); $y++) {
        for ($x = 0; $x < count($forest[$y]); $x++) {
            if (tree_visible($y, $x)) {
                $visCount++;
                $visible[$y][$x] = 'X';
            } else {
                $visible[$y][$x] = ' ';
            }
            echo $visible[$y][$x];
        }
        echo "\n";
    }
    echo "Number of visible trees: $visCount \n";
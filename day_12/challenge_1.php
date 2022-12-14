<?php 

    $datafile = 'demo.txt';

    $map = [];
    $fh = fopen($datafile, 'r');
    while ($line = trim(fgets($fh))) $map[] = str_split($line);
    fclose($fh);

    // Find start / exit positions
    $pStart = $pExit = [];
    for ($y = 0; $y < count($map); $y++) {
        for ($x = 0; $x < count($map[0]); $x++) {
            if ($map[$y][$x] == 'S') {
                $pStart[0] = $y;
                $pStart[1] = $x;
            }
            if ($map[$y][$x] == 'E') {
                $pExit[0] = $y;
                $pExit[1] = $x;
            }
        }
    } // find Start & Exit

    function h($map, $x, $y) {
        if ($x < 0 || $y < 0 || $x >= count($map[0]) || $y >= count($map)) return 255; // beyond the tile-border
        return ($map[$y][$x] == 'S') ? ord('z') : ord($map[$y][$x]);
    }

    function route($map, $x, $y) {
        if ($map[$y][$x] == 'E') return 1;          // found exit

        $h = h($map, $x, $y);
        $map[$y][$x] = chr(255);                    // explored, don't visit again

        

    }
    

    $shortestPath = route($map, $pStart[1], $pStart[0]);

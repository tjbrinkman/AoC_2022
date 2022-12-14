<?php 

    function draw_line($a, $b) { // A and B are coordinates (x,y)
        global $map;
        if ($a[0] == $b[0]) { // Vertical line, y changes
            for ($y = min($a[1], $b[1]); $y <= max($a[1], $b[1]); $y++) $map[$a[0]][$y] = 'X';
        } else { // Horizontal line, x changes
            for ($x = min($a[0],$b[0]); $x <= max($a[0],$b[0]); $x++) $map[$x][$a[1]] = 'X';
        }
    }

    $map = [];
    $abyss = 0;
    $fh = fopen($datafile, 'r');
    while ($line = trim(fgets($fh))) {
        $coord = explode('->', $line);
        for ($i = 1; $i < count($coord); $i++) { // start with coordinate 2
            $a = explode(',', trim($coord[$i - 1]));
            $b = explode(',', trim($coord[$i]));
            draw_line($a, $b);
            $abyss = max($abyss, $a[1], $b[1]);
        }
    }
    fclose($fh);

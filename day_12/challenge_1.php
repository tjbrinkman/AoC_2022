<?php 

    $datafile = 'demo.txt';

    $map = [];
    $mapStart = $mapExit = [];
    $fh = fopen($datafile, 'r');
    $y = 0;
    while ($line = trim(fgets($fh))) {
        $map[$y] = str_split($line);
        for ($x = 0; $x < count($map[$y]); $x++) {
            switch ($map[$y][$x]) {
                case 'S' : // Start
                    $mapStart[0] = $y;
                    $mapStart[1] = $x;
                    break;
                case 'E' : // Exit
                    $mapExit[0] = $y;
                    $mapExit[1] = $x;
                    break;
                default : // height
                    break;
            }
        }
        $y++;
    }
    fclose($fh);


    function route($x, $y) {
        global $map;

        if ($map[$y][$x] == 'E') return 0; // found the exit
        if ($map[$y][$x] == 'X') return false; // visited this point

        $height = ord($map[$y][$x]);
        
        if ($y > 0 && $map[$y-1][$x] <= $height+1) {
            echo "U";
        }

        

    }

    $length = route($mapStart[1], $mapStart[0]);

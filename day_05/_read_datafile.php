<?php 

    // Towers
    $towers = [];
    $fh = fopen($datafile.'_towers.txt', 'r');
    while ($line = fgets($fh)) {
        for ($x = 0; $x < strlen($line)/4; $x++) {
            $value = substr($line, $x * 4 + 1, 1);
            if (ctype_alpha($value))
                $towers[$x][] = $value;
        }
    }
    fclose($fh);
    for ($x = 0; $x < count($towers); $x++)
        $towers[$x] = array_reverse($towers[$x]);

    // Actions
    $actions = [];
    $fh = fopen($datafile.'_actions.txt', 'r');
    while ($line = fgets($fh)) {
        $line = str_replace('move ', '', $line);
        $line = str_replace('from ' , '', $line);
        $line = str_replace('to '   , '', $line);
        $actions[] = explode(' ', $line);
    }
    fclose($fh);

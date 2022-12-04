<?php 

    $pairs = [];
    $pair = 0;

    $fh = fopen($datafile, 'r');
    while ($line = fgets($fh)) {
        $pair++;
        $assignments = explode(',', $line);
        $pairs[$pair][0] = explode('-', $assignments[0]);
        $pairs[$pair][1] = explode('-', $assignments[1]);
    }
    fclose($fh);

    
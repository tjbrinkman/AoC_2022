<?php

    $fh = fopen($datafile, 'r');
    $forest = [];
    while ($line = trim(fgets($fh))) 
        $forest[] = str_split($line);
    fclose($fh);
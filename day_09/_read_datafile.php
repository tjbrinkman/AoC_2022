<?php 

    $steps = [];

    $fh = fopen($datafile, 'r');
    while ($line = trim(fgets($fh))) $steps[] = explode(' ', $line);
    fclose($fh);

<?php

    $instructions = [];
    $fh = fopen($datafile, 'r');
    while ($line = fgets($fh)) 
        $instructions[] = explode(' ', trim($line));
    fclose($fh);
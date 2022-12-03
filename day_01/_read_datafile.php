<?php 

    $elf = 1;
    $food = [];

    $fh = fopen($datafile, 'r');
    while ($line = fgets($fh, 20)) {
        if (is_numeric($line)) {
            @$food[$elf] += (int)$line; 
        } else {
            $elf++;
        }
    }
    fclose($fh);

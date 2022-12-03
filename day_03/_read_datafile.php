<?php 

    $sacks = [];
    $no = 0;

    $fh = fopen($filename, 'r');
    while ($line = trim(fgets($fh))) {
        $no++;
        $sacks[$no][0] = $line;
        $sacks[$no][1] = substr($line, 0, strlen($line)/2);
        $sacks[$no][2] = substr($line, strlen($line)/2);
    }
    fclose($fh);

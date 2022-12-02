<?php 

    $rounds = [];
    $no = 0;

    $fh = fopen($datafile, 'r');
    while ($line = fgets($fh, 20)) {
        $no++;  

        // Column 1
        $rounds[$no][0] = substr($line, 0, 1);
        switch ($rounds[$no][0]) {
            case 'A' : 
                $rounds[$no][1] = "Rock";
                break;
            case 'B' : 
                $rounds[$no][1] = "Paper";
                break;
            case 'C' : 
                $rounds[$no][1] = "Scissors"; 
                break;
        }      

        // Column 2
        $rounds[$no][2] = substr($line, 2, 1); 
    }
<?php 

    $datafile = 'data.txt';
    require('_read_file.php');



    $sandCount = 0;

    function sandfall($x, $y) {
        global $map, $abyss;
        if ($y >= $abyss) return false; // sand cannot be catched, in the abyss
        if (!isset($map[$x][$y+1])) return sandfall($x, $y+1); // freefall
        if (!isset($map[$x-1][$y+1])) return sandfall($x-1, $y+1); // fall left
        if (!isset($map[$x+1][$y+1])) return sandfall($x+1, $y+1); // fall right
        $map[$x][$y] = 'o'; // rest here...
        return true; // halted at resting position
    }    

    while (sandfall(500,0)) 
        $sandCount++;


    print_r($map);
    print "Units of sand before it flows in the abyss: $sandCount \n";
        

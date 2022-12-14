<?php 

    $datafile = 'data.txt';
    require('_read_file.php');

    $sandCount = 0;
    $floor = $abyss + 2;


    function sandfall($x, $y) {
        global $map, $floor;
        if (@$map[500][0] == 'o') return false;
        if ($y < $floor-1 && !isset($map[$x][$y+1])) return sandfall($x, $y+1); // freefall
        if ($y < $floor-1 && !isset($map[$x-1][$y+1])) return sandfall($x-1, $y+1); // fall left
        if ($y < $floor-1 && !isset($map[$x+1][$y+1])) return sandfall($x+1, $y+1); // fall right
        $map[$x][$y] = 'o'; // rest here...
        return true; // halted at resting position
    }    

    while (sandfall(500,0)) 
        $sandCount++;

    print "Units of sand before it flows in the abyss: $sandCount \n";
        

    
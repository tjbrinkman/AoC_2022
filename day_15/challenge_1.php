<?php 

    $datafile = 'data.txt';

//  readfile    
    function coord($string) {
        $coord = [];
        $xy = explode(',', $string); // split x and y
        $coord[0] = (int)explode('=', $xy[0])[1]; // x
        $coord[1] = (int)explode('=', $xy[1])[1]; // y
        return $coord;
    }

    $map = $sensors = $beacons = [];
    $fh = fopen($datafile, 'r');
    while ($line = trim(fgets($fh))) {
        $sensor = coord(explode(': ', $line)[0]);
        $beacon = coord(explode(': ', $line)[1]);
        $sensors[] = $sensor;
        $beacons[] = $beacon;
        $map[$sensor[0]][$sensor[1]] = 'S';
        $map[$beacon[0]][$beacon[1]] = 'B';
    }
    fclose($fh);

   
//  define where no beacon can be
    function taxi_distance($x1, $y1, $x2, $y2) { 
        return abs($x1 - $x2) + abs($y1 - $y2); 
    }

    function nobeacons($sensorx, $sensory, $maxdistance) {
        // draw a square around $sensorx, $sensory and test
        global $map;
        echo "#";
        for ($x = $sensorx - $maxdistance; $x <= $sensorx + $maxdistance; $x++) {
            echo ($x % 10 == 0) ? '.' : '';
            for ($y = $sensory - $maxdistance; $y <= $sensory + $maxdistance; $y++) {
                if ( taxi_distance($sensorx, $sensory, $x, $y) <= $maxdistance && !isset($map[$x][$y]) ) {
                    $map[$x][$y] = '#';
                }
            }
        } // x

        echo "\n";
    }

    // Mark Sensor/Beacon/NoBeacon
    for ($s = 0; $s < count($sensors); $s++) {
        $distance = taxi_distance($sensors[$s][0], $sensors[$s][1], $beacons[$s][0], $beacons[$s][1]); // nearest beacon
        nobeacons($sensors[$s][0], $sensors[$s][1], $distance);
    }
    
    // Calculate line
    $linenumber = 10;
    $noBeaconCounter = 0;
    foreach($map as $mapX) {
        if ( @$mapX[$linenumber] == '#' ) {
            $noBeaconCounter++;
            echo $mapX[$linenumber];
        }
    }
    
    echo "\nPositions that cannot contain a beacon: $noBeaconCounter \n";

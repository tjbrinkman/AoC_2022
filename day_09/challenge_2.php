<?php 

    $tStart = microtime(true);
    /**
     * This solution can also solve challenge-1 
     * To solve challenge-1 with this solution: change 
     * $knotCount = 10 --> $knotCount = 2
     */

    $datafile = 'data.txt';
    require('_read_datafile.php');

    class Knot {
        public $x, $y;

        function __construct() {
            $this->x = $this->y = 0;
        }
    }

    function move($direction, $distance) {
        global $rope, $log;

        for ($stepCounter = 0; $stepCounter < $distance; $stepCounter++) {
            // Move head 
            if ($direction == 'R') $rope[0]->x++;
            if ($direction == 'L') $rope[0]->x--;
            if ($direction == 'U') $rope[0]->y++;
            if ($direction == 'D') $rope[0]->y--;
            // loop through all following knots
            for ($knot = 1; $knot < count($rope); $knot++) {
                // distance to leading knot
                $distanceMax = max(abs($rope[$knot - 1]->x - $rope[$knot]->x), abs($rope[$knot - 1]->y - $rope[$knot]->y));
                if ($distanceMax > 1) { // follow the leader
                    if ($rope[$knot-1]->x > $rope[$knot]->x) $rope[$knot]->x++; // move right
                    if ($rope[$knot-1]->x < $rope[$knot]->x) $rope[$knot]->x--; // move left
                    if ($rope[$knot-1]->y > $rope[$knot]->y) $rope[$knot]->y++; // move up
                    if ($rope[$knot-1]->y < $rope[$knot]->y) $rope[$knot]->y--; // move down
                }
            }
            // log tail knot
            $log[] = "[".$rope[count($rope)-1]->x.", ".$rope[count($rope)-1]->y."]";
        }
    }

    // Init
    $log = [];
    $knotCount = 10;

    // Init Rope and log the initial position
    $rope = [];
    for ($k = 0; $k < $knotCount; $k++) $rope[$k] = new Knot();
    $log[] = "[".$rope[$knotCount-1]->x.", ".$rope[$knotCount-1]->y."]";

    // Steps
    foreach ($steps as $step) move($step[0], $step[1]);
    
    echo "Number of (unique) locations visited by tail: ".count(array_unique($log))." \n";
    echo "Execution time: ".round(microtime(true) - $tStart, 3)." ms \n";
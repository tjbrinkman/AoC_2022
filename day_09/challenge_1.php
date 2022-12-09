<?php 

    $datafile = 'data.txt';
    require('_read_datafile.php');

    class Knot {
        public $x, $y;

        function __construct() {
            $this->x = $this->y = 0;
        }
    }

    
    function move($direction, $distance) {
        global $head, $tail, $log;
        
        for ($i = 0; $i < $distance; $i++) {
            // Move head 
            if ($direction == 'R') $head->x++;
            if ($direction == 'L') $head->x--;
            if ($direction == 'U') $head->y++;
            if ($direction == 'D') $head->y--;

            // H->T MaxDistance
            $distanceMax = max(abs($head->x - $tail->x), abs($head->y - $tail->y));
            if ($distanceMax > 1) {
                // Move Tail
                if ($head->x > $tail->x) $tail->x++;
                if ($head->x < $tail->x) $tail->x--;
                if ($head->y > $tail->y) $tail->y++;
                if ($head->y < $tail->y) $tail->y--;
                $log[] = "$tail->x, $tail->y";
            }
        }
    }


    // Initial Position (head & tail): (1,1)
    $head = new Knot;
    $tail = new Knot;
    $log = [];
    $log[] = "$tail->x, $tail->y";

    foreach($steps as $step) move($step[0], $step[1]);

    echo "Number of (unique) locations visited by tail: ".count(array_unique($log))." \n";

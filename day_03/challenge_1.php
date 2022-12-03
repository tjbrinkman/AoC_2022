<?php 

    $filename = 'challenge_data.txt';
    require('_read_datafile.php');

    // Check if there is a letter in common, return the first hit
    function common ($s1, $s2) {
        for ($x = 0; $x < strlen($s1); $x++)
            if (strpos($s2, substr($s1, $x, 1)) !== false)
                return substr($s1, $x, 1);
    }

    // Return character value (a=1..z=26, A=27..Z=52)
    function priority ($item) {
        if (ctype_lower($item)) 
            return ord($item) - ord('a') + 1;
        if (ctype_upper($item)) 
            return ord($item) - ord('A') + 27;
        else return 0;
    }

    $totalPriority = 0;
    for ($no = 1; $no < count($sacks) + 1; $no++) {
        // Items in common
        $sacks[$no][3] = common($sacks[$no][1], $sacks[$no][2]);
        
        // Item Value, running total
        $totalPriority += priority($sacks[$no][3]);
    }

    echo "Sum of Priorities = $totalPriority \n";




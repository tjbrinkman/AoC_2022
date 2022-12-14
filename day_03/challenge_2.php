<?php 

    $filename = 'challenge_data.txt';
    require('_read_datafile.php');
    
    /**
     * For items in Sack-1 
     * IF item exists in Sack2 AND Sack3 THEN this is the badge
     */
    function search_badge($s1, $s2, $s3) {
        for ($i = 0; $i < strlen($s1); $i++) {
            $badge = substr($s1, $i, 1);
            if (strpos($s2, $badge) !== false && strpos($s3, $badge) !== false)
                return $badge;
        }
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
    for ($group = 0; $group < count($sacks) / 3; $group++) {
        // Search badge 
        $badge = search_badge(
            $sacks[($group * 3) + 1][0],
            $sacks[($group * 3) + 2][0],
            $sacks[($group * 3) + 3][0]
        );
        
        // Item Value, running total
        $totalPriority += priority($badge);
    }

    echo "Sum of Badge-Priorities = $totalPriority \n";


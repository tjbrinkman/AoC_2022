<?php 

    $datafile = 'challenge_data';
    require('_read_datafile.php');

    function do_action($num, $from, $to) {
        global $towers;
        $blocks = [];
        // pick $num blocks and pop them from $from
        for ($x=0; $x<$num; $x++)
            $blocks[] = array_pop($towers[$from-1]);
        // merge
        $towers[$to-1] = array_merge($towers[$to-1], array_reverse($blocks));
    }   

    // run all actions 
    foreach ($actions as $action) // format: CRATES FROM TO 
        do_action($action[0], $action[1], $action[2]);
        
    // Display results
    echo "Solution = ";
    for ($x = 0; $x < count($towers); $x++) 
        echo array_pop($towers[$x]);
    echo "\n";

<?php 

    $datafile = 'challenge_data';
    require('_read_datafile.php');

    foreach ($actions as $action)                                           // format: CRATES FROM TO
        for($x = 0; $x < $action[0]; $x++)                                  // move x number of blocks
            $towers[$action[2]-1][] = array_pop($towers[$action[1]-1]);     // towerTo[] = array_pop(towerFrom)

    // Display results
    echo "Solution = ";
    for ($x = 0; $x < count($towers); $x++) 
        echo array_pop($towers[$x]);
    echo "\n";

<?php 

    $datafile = "challenge_1_data.txt";
    require('_read_datafile.php');

    $score = 0;
    for ($no = 1; $no < count($rounds)+1; $no++) {

        // Assumption column 2
        switch ($rounds[$no][2]) {
            case 'X' : 
                $rounds[$no][3] = "Rock";
                break;
            case 'Y' : 
                $rounds[$no][3] = "Paper";
                break;
            case 'Z' : 
                $rounds[$no][3] = "Scissors"; 
                break;
        }      

        // Object-Points : Rock=1, Paper=2, Scissors=3
        switch ($rounds[$no][3]) {
            case 'Rock' : 
                $rounds[$no][4] = 1;
                break;
            case 'Paper' : 
                $rounds[$no][4] = 2;
                break;
            case 'Scissors' : 
                $rounds[$no][4] = 3;
                break;
        }

        // Result-Points : Win=6, Draw=3, Loss=0
        switch ($no) {
            case $rounds[$no][1] == $rounds[$no][3] : 
                $rounds[$no][4] += 3; // Draw
                break;
            case ( $rounds[$no][3] == 'Scissors'   && $rounds[$no][1] == 'Paper'    )
              or ( $rounds[$no][3] == 'Paper'      && $rounds[$no][1] == 'Rock'     )
              or ( $rounds[$no][3] == 'Rock'       && $rounds[$no][1] == 'Scissors' ) :
                $rounds[$no][4] += 6; // Win
                break;
            default : // Loss, 0 punten
                break;
        }

        // Update Score
        $score += $rounds[$no][4];
    }

    echo "Total Score = $score \n";

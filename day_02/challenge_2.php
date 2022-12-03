<?php 

    $datafile = "challenge_data.txt";
    require('_read_datafile.php');

    $score = 0;
    for ($no = 1; $no < count($rounds)+1; $no++) {
        // Result Target
        // X = Lose, Y = Draw, Z = Win
        switch ($rounds[$no][2]) {
            case 'X' : 
                $rounds[$no][3] = 'Lose';
                break;
            case 'Y' : 
                $rounds[$no][3] = 'Draw';
                break;
            case 'Z' :
                $rounds[$no][3] = 'Win';
                break;
        }

        // Actions
        switch ($rounds[$no][3]) {
            case 'Lose' :
                switch ($rounds[$no][1]) {
                    case 'Rock' : 
                        $rounds[$no][4] = 'Scissors';
                        break;
                    case 'Paper' :
                        $rounds[$no][4] = 'Rock';
                        break;
                    case 'Scissors' :
                        $rounds[$no][4] = 'Paper';
                }
                break;
            case 'Draw' :
                $rounds[$no][4] = $rounds[$no][1]; // Same as opponent
                break;
            case 'Win'  :
                switch ($rounds[$no][1]) {
                    case 'Rock' : 
                        $rounds[$no][4] = 'Paper';
                        break;
                    case 'Paper' :
                        $rounds[$no][4] = 'Scissors';
                        break;
                    case 'Scissors' :
                        $rounds[$no][4] = 'Rock';
                }
                break;
        }

        // Object-Points : Rock=1, Paper=2, Scissors=3
        switch ($rounds[$no][4]) {
            case 'Rock' : 
                $rounds[$no][5] = 1;
                break;
            case 'Paper' : 
                $rounds[$no][5] = 2;
                break;
            case 'Scissors' : 
                $rounds[$no][5] = 3;
                break;
        }

        // Result-Points : Win=6, Draw=3, Lose=0
        switch ($rounds[$no][3]) {
            case 'Win' :
                $rounds[$no][5] += 6;
                break;
            case 'Draw' :
                $rounds[$no][5] += 3;
                break;
            case 'Lose' :
                // Geen punten
                break;
        }

        // Update Score
        $score += $rounds[$no][5];

    }

    echo "Total Score = $score \n";


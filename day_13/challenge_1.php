<?php 

    $datafile = 'data.txt';
    $data = file($datafile);


    function is_smaller($v1, $v2) {
        if (is_numeric($v1)) $v1 = [$v1];
        if (is_numeric($v2)) $v2 = [$v2];

        if (count($v2) < count($v1)) return false;
        for ($i = 0; $i < count($v1); $i++) {
            if (is_numeric($v1[$i]) && is_numeric($v2[$i])) {
            //  Both numeric
                if ($v1[$i] > $v2[$i]) return false;
            } else {
            //  One is of type array
                if (!is_smaller($v1[$i], $v2[$i])) return false;
            }
        }
        return true;
    }

    function validate_pair($p1, $p2) {
        $p1 = json_decode($p1);
        $p2 = json_decode($p2, false);

        return is_smaller($p1, $p2);
    }

    $pairs = (count($data)+1)/3;
    $sum = 0;
    for ($pair = 0; $pair < $pairs; $pair++) {
        if ( validate_pair($data[$pair * 3], $data[$pair * 3 + 1]) ) {
            echo ($pair + 1)." \n";
            $sum += ($pair + 1);
        }        
    }

    echo"Sum of indices: $sum \n";


<?php

    $fh = fopen($datafile, 'r');
    $data = fgets($fh);
    fclose($fh);
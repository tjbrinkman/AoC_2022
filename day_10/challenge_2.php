<?php 

    // Solves both 1 and 2

    $datafile = 'data.txt';
    require('_read_datafile.php');

    class Cpu {
        public $cycles, $register, $sumStrength;

        function __construct() {
            $this->register = 1;
            $this->cycles = $this->sumStrength = 0;
        }

        function crt() {
            $position = ($this->cycles % 40);
            echo (abs($this->register - $position) <= 1) ? 'X' : ' ';
            if ($position == 39) echo "\n";
        }

        function cycle() {
            $this->crt();
            $this->cycles++;
            if (($this->cycles - 20) % 40 == 0) 
                $this->sumStrength += ($this->cycles * $this->register);
        }

        function execute($instruction) {
            switch ($instruction[0]) {
                case 'noop' : // no operation
                    $this->cycle();
                    break;
                case 'addx' : // add x to register
                    $this->cycle();
                    $this->cycle();
                    $this->register += $instruction[1];
                    break;
            }
        }
    }

    $cpu = new Cpu();
    foreach($instructions as $instruction) 
        $cpu->execute($instruction);
    
    echo "Sum of signal-stregth: $cpu->sumStrength \n";
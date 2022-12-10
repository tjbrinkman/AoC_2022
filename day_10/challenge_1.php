<?php 

    $datafile = 'data.txt';
    require('_read_datafile.php');

    class Cpu {
        public $cycles, $register, $sumStrength;

        function __construct() {
            $this->register = 1;
            $this->cycles = $this->sumStrength = 0;
        }

        function cycle() {
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
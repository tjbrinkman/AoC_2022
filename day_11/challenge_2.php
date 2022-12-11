<?php
    $tStart = microtime(true);

    $datafile = 'data.txt';
    $data = file($datafile);

    class Monkey {
        public $items, $operator, $operand, $test, $testTrue, $testFalse;

        function __construct() {
            $this->items = [];
            $this->operator = $this->operand = $this->test = $this->testTrue = $this->testFalse = 0;
        }
    }

    $monkey = 0;
    $monkeys = [];
    foreach ($data as $line) {
        $d = explode(' ', trim($line));
        switch ($d[0]) {
            case "Monkey" : // New Monkey
                $monkey = (int)str_replace(':', '', $d[1]);
                $monkeys[$monkey] = new Monkey();
                break;
            case "Starting" : // Inventory
                $monkeys[$monkey]->items = explode(',', str_replace(' ', '', explode(':', $line)[1]));
                break;
            case "Operation:" : // Operation on inventory
                $monkeys[$monkey]->operator = $d[4];
                $monkeys[$monkey]->operand  = $d[5];
                break;
            case "Test:" : // Test Criteria
                $monkeys[$monkey]->test = $d[count($d)-1];
                break;
            case "If" : // Actions
                if ($d[1] == 'true:') $monkeys[$monkey]->testTrue = $d[count($d)-1];
                if ($d[1] == 'false:') $monkeys[$monkey]->testFalse = $d[count($d)-1];
                break;
        }
    }

    $activeMonkey = [];
    $testProduct = 1;
    for ($m = 0; $m < count($monkeys); $m++) 
        $testProduct *= (int)$monkeys[$m]->test;

    for ($rounds = 0; $rounds < 10000; $rounds++) {
        for ($m = 0; $m < count($monkeys); $m++) { // for all monkeys
            while ($item = (int)array_shift($monkeys[$m]->items)) { // all items
                @$activeMonkey["Monkey $m"]++;
                $operand = ($monkeys[$m]->operand == 'old') ? $item : (int)$monkeys[$m]->operand;
                switch ($monkeys[$m]->operator) {
                    case '+' : // add
                        $item += $operand;
                        break;
                    case '*' : // multiply
                        $item *= $operand;
                        break;
                } // operator
                /**
                 * In Challenge 2 the "floor($item / 3) is removed
                 * This leads to an integer overflow...
                 * Solution: multiply all "tests" ($testProduct)
                 * When passing the item to the next monkey: don't pass the worry-factor ($item)
                 * but the worry-factor % testProduct ($item % $testProduct)
                 */
                $item = $item % $testProduct; 
                $receiver = ($item % (int)$monkeys[$m]->test == 0) ? (int)$monkeys[$m]->testTrue : (int)$monkeys[$m]->testFalse;
                $monkeys[$receiver]->items[] = $item;
            } // items
        } // monkeys
    }

    arsort($activeMonkey);
    echo "Monkey Business: ".(array_shift($activeMonkey) * array_shift($activeMonkey))." \n";   
    echo "Total execution time: ".round((microtime(true) - $tStart) * 1000, 3)." ms\n";
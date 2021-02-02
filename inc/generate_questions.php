<?php
// set number of questions
$question_count = 10;


// is $_SESSION['questions'] is not set
if (!isset($_SESSION['questions'])) {
    // set $_SESSION['questions'] to an empty array
    $_SESSION['questions'] = [];

    // for each question
    for ($i=0;$i<$question_count;$i++) {
        $used_numbers = [];

        // store question info in $_SESSION['questions']
        $_SESSION['questions'][$i]['leftAdder'] = rand(20, 100);
        $_SESSION['questions'][$i]['rightAdder'] = rand(20, 100);
        $_SESSION['questions'][$i]['correctAnswer'] = $_SESSION['questions'][$i]['leftAdder'] + $_SESSION['questions'][$i]['rightAdder'];


        // set first incorrect answer to semi-random number
        do {
            $_SESSION['questions'][$i]['firstIncorrectAnswer'] = rand(-10, 10) + $_SESSION['questions'][$i]['correctAnswer'];
        } while( 
            // while first incorrect answer is in used numbers
            in_array($_SESSION['questions'][$i]['firstIncorrectAnswer'], $used_numbers)
        );

        // add first incorrect answer to used numbers
        array_push($used_numbers, $_SESSION['questions'][$i]['firstIncorrectAnswer']);


        // set second incorrect answer to semi-random number
        do {
            $_SESSION['questions'][$i]['secondIncorrectAnswer'] = rand(-10, 10) + $_SESSION['questions'][$i]['correctAnswer'];
        } while( 
            // while second incorrect answer is in used numbers
            in_array($_SESSION['questions'][$i]['secondIncorrectAnswer'], $used_numbers)
        );

        // add second incorrect answer to used numbers
        array_push($used_numbers, $_SESSION['questions'][$i]['secondIncorrectAnswer']);
    }
}

// make questions more easily accessible
$questions = $_SESSION['questions'];


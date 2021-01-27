<?php
// set number of questions
$question_count = 10;


// is $_SESSION['questions'] is not set
if (!isset($_SESSION['questions'])) {
    // set $_SESSION['questions'] to an empty array
    $_SESSION['questions'] = [];

    // for each question
    for ($i=0;$i<$question_count;$i++) {

        // store question info in $_SESSION['questions']
        $_SESSION['questions'][$i]['leftAdder'] = rand(20, 100);
        $_SESSION['questions'][$i]['rightAdder'] = rand(20, 100);
        $_SESSION['questions'][$i]['correctAnswer'] = $_SESSION['questions'][$i]['leftAdder'] + $_SESSION['questions'][$i]['rightAdder'];
        $_SESSION['questions'][$i]['firstIncorrectAnswer'] = $_SESSION['questions'][$i]['leftAdder'] + $_SESSION['questions'][$i]['rightAdder'] - 14;
        $_SESSION['questions'][$i]['secondIncorrectAnswer'] = $_SESSION['questions'][$i]['leftAdder'] + $_SESSION['questions'][$i]['rightAdder'] + 14;
    }
}

// make questions more easily accessible
$questions = $_SESSION['questions'];


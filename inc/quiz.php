<?php
// start session
session_start();

// include prewritten questions
//include("questions.php");

//include generated questions
include("generate_questions.php");
$show_score = false;

// make a variable to hold the total number of questions
$total_questions = count($questions);

// create the toast
$toast = null;

// if the request method is post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // if answer is equal to question's correct answer
    if ($_POST['answer'] == $questions[$_POST['id']]['correctAnswer']) {
        // congratulate the user
        $toast = 'Correct. Congrats!';

        // increase total correct by one
        $_SESSION['total_correct'] += 1;

    } else {
        // let the user know that the answer was incorrect
        $toast = 'Sorry, Incorrect.';
    }
}

// if used indexes is not set
if(!isset($_SESSION['used_indexes'])) {
    // set used indexes to an empty array
    $_SESSION['used_indexes'] = [];

    // set total correct to zero
    $_SESSION['total_correct'] = 0;
}


// if the number of used indexes is equal to the total number of questions
if (count($_SESSION['used_indexes']) == $total_questions) {
    // set used indexes to an empt array
    $_SESSION['used_indexes'] = [];

    // show the score
    $show_score = true;

    // destroy the session
    session_destroy();
    
} else {
    // set show score to false
    $show_score = false;

    // if the number of used indexes is equal to zero
    if (count($_SESSION['used_indexes']) == 0) {
        // set total correct to zero
        $_SESSION['total_correct'] = 0;
        
        // set toast to an empty string
        $toast = '';
    } 

    // set index equal to a random number while index is in used indexes
    do{$index = array_rand($questions);} while(in_array($index, $_SESSION['used_indexes']));
    
    // select a random question
    $question = $questions[$index];
    
    // add random question's index to used indexes
    array_push($_SESSION['used_indexes'], $index);
    
    // assign answers to an array and shuffle
    $answers = [
        $question['correctAnswer'],
        $question['firstIncorrectAnswer'],
        $question['secondIncorrectAnswer']
    ];
    shuffle($answers); 
}


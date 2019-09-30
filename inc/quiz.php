<?php
/*
 * PHP Techdegree Project 2: Build a Quiz App in PHP
 */
session_start();
// Include questions
include ('generate_questions.php');
$question_num = filter_input(INPUT_GET, 'p', FILTER_SANITIZE_NUMBER_INT);
if (empty ($question_num)){
    $question_num = 1;
}

if ($question_num <= 10) {
    // Show random question
// Show which question they are on
// Show random question
    echo "<p class='breadcrumbs'> Question ". $question_num . " of 10 </p>";
    echo '<form method = "post" action="index.php?p='. ($question_num + 1) . '" />';
    echo "<p class='quiz'> What is " . $leftAdder . "+" . $rightAdder . "? </p>";
// Shuffle answer buttons
shuffle($answers);
    echo "<input type='submit' class='btn' name='answer' value=' " . $answers[0] . "'>";
    echo "<input type='submit' class='btn' name='answer' value=' " . $answers[1] . "'>";
    echo "<input type='submit' class='btn' name='answer' value=' " . $answers[2] . "'>";
    echo "<input type='hidden' name='correctAnswer' value='" . $correctAnswer . "'>";
    echo '</form>';
  }
// Keep track of answers
// Toast correct and incorrect answers

if (!isset($_SESSION['numberCorrect'])) {
    $_SESSION['numberCorrect'] = 0;
}
if (isset($_POST['answer']) && isset($_POST['correctAnswer'])) {
    $_SESSION['answer'] = filter_input(INPUT_POST, 'answer', FILTER_SANITIZE_NUMBER_INT);
    $_SESSION['correctAnswer'] = filter_input(INPUT_POST, 'correctAnswer', FILTER_SANITIZE_NUMBER_INT);
if (($_SESSION['answer'] == $_SESSION['correctAnswer'])) {
    $_SESSION['numberCorrect']++;
    echo '<h1>CORRECT!</h1>';
}elseif ($_SESSION['answer'] !== $_SESSION['correctAnswer']){
    echo '<h1>WRONG! The correct answer was ' . $_SESSION['correctAnswer'] . '.</h1>';
        }
}
// Show score & button to restart
if ($question_num == 11) {
    echo '<h1> You got '. $_SESSION['numberCorrect'] . ' out of 10 correct!</h1>';
    echo "<form action='index.php' method='GET'>";
    echo "<input type='submit' class='btn' name='restart' value='Try Again?'>";
    session_destroy();
    echo '</form>';
}

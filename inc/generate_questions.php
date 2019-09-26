<?php
// Generate random questions

$questions =[];

// Loop for required number of questions
for ($i = 0; $i <= 9; $i++) {


// Get random numbers to add
$leftAdder= rand(0,100);
$rightAdder= rand(0,100);



// Calculate correct answer
$correctAnswer = $leftAdder + $rightAdder;




// Get incorrect answers within 10 numbers either way of correct answer

$wrongAnswer1= $correctAnswer + rand(1,10);
/*  if ($wrongAnswer1 = $correctAnswer){
    $wrongAnswer1 + 1;
  }*/

$wrongAnswer2= $correctAnswer + rand(-10,-1);
/*if ($wrongAnswer2 = $correctAnswer){
   $wrongAnswer2 + 4;
}*/
// Make sure it is a unique answer???



// Add question and answer to questions array
$questions[] = [
    'leftAdder' => $leftAdder,
    'rightAdder' => $rightAdder,
    'correctAnswer' => $correctAnswer,
    'wrongAnswer1' => $wrongAnswer1,
    'wrongAnswer2' => $wrongAnswer2
];
$answers = [
  $correctAnswer,
  $wrongAnswer1,
  $wrongAnswer2
];
}

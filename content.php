<?php
require_once 'QuestionClass.php';
require_once 'readQuestions.php';
use questions\Question;

$questions = readQuestionsFromFile('./questions.txt');

global $singleAnswer;
global $multipleAnswers;
global $wordAnswers;
global $page;
$page =1;

if(!empty($questions))
{
    $singleAnswer = [];
    $multipleAnswers = [];
    $wordAnswers = [];

    foreach ($questions as $question)
    {
        if ($question->isWordAnswer()) {
            $wordAnswers[] = $question;
        }
        elseif (!$question->getMultipleCorrect()) {
            $singleAnswer[] = $question;
        }
        else {
            $multipleAnswers[] = $question;
        }
    }
}

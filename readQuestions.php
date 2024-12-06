<?php
require_once 'QuestionClass.php';
require_once 'AnswerClass.php';
use questions\Question;
use answer\Answer;

function readQuestionsFromFile($filePath)
{
    $questions = [];
    if (!file_exists($filePath)) {
        die("File not found: " . $filePath);
    }
    $file = fopen($filePath, 'r');
    if (!$file) {
        die("Failed to open file: " . $filePath);
    } else {
        $currentQuestion = null;
        $multipleCorrect = false;
        $isWordAnswer = false;

        while (($line = fgets($file)) !== false) {
            $line = trim($line);
            if (empty($line)) {                 // Якщо питання завершилось
                if ($currentQuestion) {
                    $questions[] = $currentQuestion;
                    $currentQuestion = null;
                }
                continue;
            }

            if ($line === '# OneAnswer') {
                $multipleCorrect = false;
                $isWordAnswer = false;
                continue;
            } elseif ($line === '# MultipleAnswers') {
                $multipleCorrect = true;
                $isWordAnswer = false;
                continue;
            } elseif ($line === '# WordAnswer') {
                $isWordAnswer = true;
                continue;
            }

            if (!$currentQuestion) {
                $currentQuestion = new Question($line, [], $multipleCorrect, $isWordAnswer);
            } else {
                if ($isWordAnswer) {
                    $answerText = $line;
                    $currentQuestion->addAnswer($answerText, true);
                } else {
                    [$answerText, $isCorrect] = explode(':', $line);
                    $isCorrect = trim($isCorrect) === 'true';
                    $currentQuestion->addAnswer($answerText, $isCorrect);
                }
            }
        }

        fclose($file);
    }
    return $questions;
}


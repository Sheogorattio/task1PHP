<?php
function loadSingleAnswer() {
    $questions = $GLOBALS['singleAnswer'];
    $result = '';
    foreach ($questions as $index => $question) {
        $result .= '<h2>' . $question->getText() . '</h2>';
        foreach ($question->getAnswers() as $answer) {
            $result .= '<label><input type="radio" name="q1_' . $index . '" value="' . ($answer->isRight() ? 'true' : 'false') . '">' . $answer->getText() . '</label><br>';
        }
    }
    return $result;
}

function loadMultipleAnswers() {
    $questions = $GLOBALS['multipleAnswers'];
    $result = '';
    foreach ($questions as $index => $question) {
        $result .= '<h2>' . $question->getText() . '</h2>';
        foreach ($question->getAnswers() as $answer) {
            $result .= '<label><input type="checkbox" name="q2_' . $index . '[]" value="' . ($answer->isRight() ? 'true' : 'false') . '">' . $answer->getText() . '</label><br>';
        }
    }
    return $result;
}

function loadWordAnswer() {
    $questions = $GLOBALS['wordAnswers'];
    $result = '';
    foreach ($questions as $index => $question) {
        $result .= '<h2>' . $question->getText() . '</h2>';
        $result .= '<input type="text" name="q3_' . $index . '"><br>';
    }
    return $result;
}
<?php
if (!isset($_SESSION['radioScore'])) $_SESSION['radioScore'] = 0;
if (!isset($_SESSION['multipleScore'])) $_SESSION['multipleScore'] = 0;
if (!isset($_SESSION['wordScore'])) $_SESSION['wordScore'] = 0;

function showTotal () :void
{
    echo "<br>";
    echo "TOTAL: " . ($_SESSION['radioScore'] + $_SESSION['wordScore'] + $_SESSION['multipleScore']) . "<br>";
    echo "Single: " . $_SESSION['radioScore'] . "<br>";
    echo "Multiple: " . $_SESSION['multipleScore'] . "<br>";
    echo "Word: " . $_SESSION['wordScore'] . "<br>";
}

function resetScore () :void
{
    $_SESSION['radioScore'] = 0;
    $_SESSION['multipleScore'] = 0;
    $_SESSION['wordScore'] = 0;
}
function checkRadioQuestions($data): void
{
    if (!isset($_SESSION['radioScore'])) {
        $_SESSION['radioScore'] = 0;
    }
    foreach ($data as $value) {
        if ($value == "true") {
            $_SESSION['radioScore']++;
        }
    }
}
function checkMultipleQuestions($data):void
{
    if (!isset($_SESSION['multipleScore'])) {
        $_SESSION['multipleScore'] = 0;
    }
    foreach ($data as $value)
    {
        foreach ($value as $result)
        {
            if ($result == "true") $_SESSION['multipleScore'] += 3;
        }
    }
}
function checkWordQuestions($data): void
{
    if (!isset($_SESSION['wordScore'])) {
        $_SESSION['wordScore'] = 0;
    }

    $questions = $GLOBALS['wordAnswers'];

    foreach ($data as $key => $value) {
        // Розбиваємо ключ на частини
        $parts = explode('_', $key);
        $index = (int)end($parts);
        // Порівнюємо відповіді
        $_val = trim(strtolower($value));
        $_answ = trim(strtolower(explode(':',$questions[$index]->getAnswers()[0]->getText())[0]));

        if ($_val === $_answ) {
            $_SESSION['wordScore'] += 5;
        }
    }
}

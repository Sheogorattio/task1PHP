<?php
    require 'QuestionClass.php';
    use questions\Question;
    session_start();

    $oneAnswer = new Question(
        'Яке з наступних явищ відображає теорему про відносність Ейнштейна, що стосується часу і швидкості?',
        array()
    );
    $oneAnswer->addAnswer('Парадокс близнюків', true);
    $oneAnswer->addAnswer('Закон термодинаміки', false);
    $oneAnswer->addAnswer('Закон Гука',false);

    $multipleAnswers = new Question(
        'Які з цих концепцій є частиною квантової механіки?',
        array()
    );
    $multipleAnswers->addAnswer('Принцип невизначеності Гейзенберга', true);
    $multipleAnswers->addAnswer('Закон збереження енергії',false);
    $multipleAnswers->addAnswer('Квантова суперпозиція', true);
    $multipleAnswers->addAnswer('Квантова заплутаність', true);

    $openAnswer = new Question('Поясніть, як працює блокчейн і чому він є безпечним механізмом для зберігання та передачі даних.', array());

    $_SESSION['oneAnswer'] = $oneAnswer;
    $_SESSION['multipleAnswers'] = $multipleAnswers;
    $_SESSION['openAnswer'] = $openAnswer;
?>

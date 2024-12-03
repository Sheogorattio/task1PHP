<?php
require 'content.php';
session_start();
$oneAnswer = $_SESSION['oneAnswer'];
$multipleAnswers = $_SESSION['multipleAnswers'];
$openAnswer = $_SESSION['openAnswer'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Тест на знання</title>
</head>
    <body>

        <?php
            $tag = 'div';
            $backgroundColor = '#4CAF50';
            $color = '#ffffff';
            $width = '200px';
            $height = '100px';

            $style = "background-color: $backgroundColor; color: $color; width: $width; height: $height;";

            $htmlElement = "<$tag style=\"$style\">Цей елемент з динамічними стилями</$tag>";
        ?>
        <div class="container">
            <?php echo $htmlElement; ?>

            <pre id="output">
                <?php echo htmlspecialchars($htmlElement); ?>
            </pre>
        </div>
        <h1>Тест на знання</h1>

        <form action="" method="POST">

            <section class="question">
                <h2><?php echo $oneAnswer->getText(); ?></h2>
                <?php
                foreach ($oneAnswer->getAnswers() as $answer) {
                    echo '<label><input type="radio" name="q1" value="' . $answer->getText() . '">' . $answer->getText() . '</label><br>';
                }
                ?>
            </section>

            <section class="question">
                <h2><?php echo $multipleAnswers->getText(); ?></h2>
                <?php
                foreach ($multipleAnswers->getAnswers() as $answer) {
                    echo '<label><input type="checkbox" name="q2[]" value="' . $answer->getText() . '">' . $answer->getText() . '</label><br>';
                }
                ?>
            </section>

            <section class="question">
                <h2><?php echo $openAnswer->getText(); ?></h2>
                <textarea name="q3" rows="4" cols="50"></textarea>
            </section>

            <button type="submit" class="submit-btn">Відправити відповіді</button>

        </form>

    </body>
</html>

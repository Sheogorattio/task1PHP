<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();
require_once 'content.php';
require_once 'contentLoaders.php';
require_once 'checker.php';
const MAX_PAGES = 4;
$_SESSION['page'] = !empty($_SESSION['page']) && $_SESSION['page'] <= MAX_PAGES ? (integer)$_SESSION['page'] : (integer)0;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Тест на знання</title>
</head>
<body>
<h1>Тест на знання</h1>
<form action="" method="POST">
    <section class="question">
        <?php
            if($_SESSION['page'] ==0)
            {
                echo loadSingleAnswer();
            }
            elseif($_SESSION['page'] ==1)
            {
                echo  loadMultipleAnswers();
            }
            elseif($_SESSION['page'] ==2)
            {
                echo  loadWordAnswer();
            }
            elseif($_SESSION['page'] ==3)
            {
               echo "Натисніть 'Завершити' щоб побачити результати";
            }
            elseif($_SESSION['page'] ==4)
            {
                echo showTotal();
            }
        ?>
    </section>
    <button type="submit" class="submit-btn" style="display: <?php echo $_SESSION['page'] > MAX_PAGES-1 ? 'none' : 'block' ?>">
        <?php echo $_SESSION['page']==3? "Завершити" : "Далі"  ?>
    </button>
</form>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    switch ($_SESSION['page']) {
        case 1:
            resetScore();
            if (!empty($_POST)) {
                checkRadioQuestions($_POST);
            }
            break;
        case 2:
            if (!empty($_POST) ) {
                checkMultipleQuestions($_POST);
            }
            break;
        case 3:
            if (!empty($_POST)) {
                checkWordQuestions($_POST);
            }
            break;
    }

    $_SESSION['page']++;

    if ($_SESSION['page'] > MAX_PAGES) {
        $_SESSION['page'] = 0;
    }
}
?>

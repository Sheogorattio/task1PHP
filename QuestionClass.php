<?php
    namespace questions;
    require_once 'AnswerClass.php';
    use answer\Answer;

    class Question
    {
        private $text;
        private array $answers;
        private bool $multipleCorrect;
        private bool $isWordAnswer;
        function __construct($text, $answers,$multipleCorrect, $isWordAnswer = false)
        {
            $this->text = $text;

            if (!is_array($answers))
            {
                $answers = array();
            }

            $this->answers = $answers;
            $this->multipleCorrect = $multipleCorrect;
            $this->isWordAnswer = $isWordAnswer;
        }
        public function getText()
        {
            return $this->text;
        }
        public function getAnswers()
        {
            return $this->answers;
        }

        public function addAnswer($text, $isRight):void
        {
            $this->answers[]= new Answer($text, $isRight);
        }
        public function getMultipleCorrect()
        {
            return $this->multipleCorrect;
        }
        public function isWordAnswer()
        {
            return $this->isWordAnswer;
        }

    }
?>
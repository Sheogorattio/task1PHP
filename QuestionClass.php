<?php
    namespace questions;
    require 'AnswerClass.php';
    use answer\Answer;

    class Question {
        private $text;
        private array $answers;
        function __construct($text, $answers) {
            $this->text = $text;

            if (!is_array($answers)) {
                $answers = array();
            }

            $this->answers = $answers;
        }
        public function getText() {
            return $this->text;
        }
        public function getAnswers() {
            return $this->answers;
        }

        public function addAnswer($text, $isRight):void {
            $this->answers[]= new Answer($text, $isRight);
        }

    }
?>
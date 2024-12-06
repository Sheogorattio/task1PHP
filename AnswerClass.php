<?php
    namespace answer;
    class Answer
    {
        private string $text;
        private bool $isRight;
        public function __construct(string $text, bool $isRight = false)
        {
            $this->text = $text;
            $this->isRight = $isRight;
        }
        public function getText() : string
        {
            return $this->text;
        }
        public function setText(string $text)
        {
            $this->text = $text;
        }
        public function isRight() : bool
        {
            return $this->isRight;
        }
        public function setIsRight(bool $isRight)
        {
            $this->isRight = $isRight;
        }
    }
?>
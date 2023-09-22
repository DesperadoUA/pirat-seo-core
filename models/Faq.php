<?php
class FaqItem {
    public $question = '';
    public $answer = '';
    function __construct(string $question, string $answer) {
        $this->question = $question;
        $this->answer = $answer;
    }
}
class Faq {
    public $title = '';
    /**
     * @var FaqItem[]
     */
    public $posts = [];
    function __construct(string $title, array $posts) {
        $this->title = $title;
        $this->posts = $posts;
    }
}
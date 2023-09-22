<?php
class HeadData {
    public $title = '';
    public $description = '';
    function __construct(string $title = '', string $description = '') {
        $this->title = $title;
        $this->description = $description;
    }
}
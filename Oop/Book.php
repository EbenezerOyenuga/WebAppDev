<?php

class Book {
    public $title;
    public $author;

    public function __construct($title, $author) {
        $this->title = $title;
        $this->author = $author;
    }

    public function getDetails() {
        return "Title: " . $this->title . ", Author: " . $this->author;
    }
}

$book = new Book("1984", "George Orwell");
echo $book->getDetails();

echo"<hr/>";

$book2 = new Book("To Kill a Mockingbird", "Harper Lee");
echo "\n" . $book2->getDetails();
<?php

class Book {
    public $title;
    public $author;

    public function __construct($book_title, $book_author) {
        $this->title = $book_title;
        $this->author = $book_author;
    }

    public function getDetails() {
        return "The Title of the book is: " . $this->title . ", and the Author is: " . $this->author;
        //The title is "The Great Gatsby", and the author is F. Scott Fitzgerald.
    }
}

$book = new Book("Animal Farm", "George Orwell");
echo "Book title is: ".$book->title; //Animal Farm
echo "</br>";
echo "Book author is: ".$book->author; //George Orwell
echo $book->getDetails();

echo"<hr/>";

$book2 = new Book("To Kill a Mockingbird", "Harper Lee");
echo "\n" . $book2->getDetails();
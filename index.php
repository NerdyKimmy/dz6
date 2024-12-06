<?php

require_once 'book.php';

$jsonFile = 'books.json';
$jsonData = file_get_contents($jsonFile);

if (!$jsonData) {
    die("Не вдалося прочитати файл $jsonFile");
}

$data = json_decode($jsonData, false);
$books = [];

foreach ($data as $bookData) {
    $publishingHouse = new PublishingHouse();
    $publishingHouse->Id = $bookData->PublishingHouse->Id;
    $publishingHouse->Name = $bookData->PublishingHouse->Name;
    $publishingHouse->Adress = $bookData->PublishingHouse->Adress;

    $book = new Book();
    $book->PublishingHouseId = $bookData->PublishingHouseId;
    $book->Title = $bookData->Title;
    $book->PublishingHouse = $publishingHouse;

    $books[] = $book;
}

foreach ($books as $book) {
    echo json_encode($book, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) . PHP_EOL;
}

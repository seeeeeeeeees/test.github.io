<?php
$isbn = "9780545010221"; // Пример ISBN книги

// Формируем URL для запроса к Open Library API
$url = "https://openlibrary.org/api/books?bibkeys=ISBN:$isbn&format=json&jscmd=data";

// Отправляем GET-запрос и получаем ответ
$response = file_get_contents($url);

// Преобразуем ответ в формат JSON
$data = json_decode($response, true);

// Проверяем наличие информации о книге
if(isset($data["ISBN:$isbn"])) {
    $bookInfo = $data["ISBN:$isbn"];
    
    // Выводим информацию о книге
    echo "Название: " . $bookInfo["title"] . "<br>";
    echo "Автор: " . $bookInfo["authors"][0]["name"] . "<br>";
    echo "Год издания: " . $bookInfo["publish_date"] . "<br>";
    echo "Обложка: <img src='" . $bookInfo["cover"]["large"] . "'><br>";
} else {
    echo "Книга не найдена.";
}
?>

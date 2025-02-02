<?php

#Подключение CSS
echo "<link rel='stylesheet' href='css/style2.css'>";

#Определение URL-адреса сайта
$url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'];

#Изменение имени на уникальный id
$FileName = $_FILES['videoF']['name'] = uniqid(12). '' .'.mp4' ;

#Папка, куда сохраняются видео
$uploaddir = 'vid/';

$uploadfile = $uploaddir . $FileName;

#Максимальный размер видео, которе можно загрузить
ini_set('post_max_size', '20M');
ini_set('upload_max_filesize', '20M');

echo '<pre>';
if (move_uploaded_file($_FILES['videoF']['tmp_name'], $uploadfile)) {
    echo "<p class='uploadPage'>Файл не содержит ошибок и успешно загрузился на сервер.</p>";
    print "<p class='uploadPage'>Ссылка на видео: <a href='".$url."/".$uploadfile."' class='videoURL' id='url' target='_blank'>$url/$uploadfile</a></p>";
} else {
    echo "<p class='uploadPage'>Слишком большой размер файла!</p>";
}
echo "<p class='uploadPage'><a href='".$url."' class='videoURL'>Назад</a></p>";
echo '</pre>';
?>

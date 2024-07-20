<?php

echo "<link rel='stylesheet' href='css/style2.css'>";

$url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'];

$FileName = $_FILES['videoF']['name'] = uniqid(12). '' .'.mp4' ;
$fileRealName = $_FILES['videoF']['name'];

$uploaddir = 'vid/';
$uploadfile = $uploaddir . $FileName;

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
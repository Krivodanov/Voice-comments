<?php
/**
 * Скрипт обрабатывающий POST запрос на добавление голосового коментария
 * Принимает форму содержащую BLOB объект записи голоса пользователя
 * Возвращает JSON бъект в зависимоти от результата обработки
 */
$uploadDir = 'voice/';
$typeFile = explode('/', $_FILES['voice']['type']);
$uploadFile = $uploadDir . basename(md5($_FILES['voice']['tmp_name'].time()).'.'.$typeFile[1]);
if (move_uploaded_file($_FILES['voice']['tmp_name'], $uploadFile)) {
    $response = ['result'=>'OK', 'data'=>'../'.$uploadFile];
} else {
    $response = ['result'=>'ERROR', 'data'=>''];
}
echo json_encode($response);
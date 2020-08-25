<?php

//Подключение к базе данных из файла configDB.php
require 'configDB.php';

//Принимаем данные от пользвателя
$task = $_POST['task'];
if($task == '')
{
	echo 'Введите задание';
	exit();
}

$sql = 'INSERT INTO tasks(task) VALUES(:task)';
$query = $pdo->prepare($sql);
$query->execute(['task' => $task]);

//Перенаправление пользователя на главную страничку после нажатия на кнопку "отправить"
header('Location: /');
?>
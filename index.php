<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>TODO-list</title>
	<link href="css/style.css" rel="stylesheet">
	<link href="css/bootstrap.css" rel="stylesheet">
</head>
<body>
	<div class="container">
		<h1 class="header text-center">To-do list</h1>
		<form class="bg-warning" action="add.php" method="post">
			<input type="text" name="task" id="task" placeholder="Нужно сделать.." class="form-control">
			<button type="submit" name="sendTask" class="btn btn-danger font-weight-bold">Отправить</button>
		</form>
	</div>
		<?php
			//Подключение к базе данных из файла configDB.php
			require 'configDB.php';

			//Начало списка
			echo '<ul>';
			$query = $pdo->query('SELECT * FROM `tasks` ORDER BY `id` DESC');

			/*Перебор всех данных из таблицы tasks
			row - ряд
			fetch() - показываем внутри функции, каким образом будем получать данные (в данном случае - как oбъект)
			*/
			while($row = $query->fetch(PDO::FETCH_OBJ))
			{
				//Обращение к row и из него вывод task
				echo '<li><b>' . $row->task . '</b><a href="/delete.php?id=' . $row->id . '"<button class="text-light font-weight-bold btn btn-danger float-right btn-sm"> Delete </button></a></li>';
			}
			echo '<ul/>';
		?>
	</div>
</body>
</html>
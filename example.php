<?php
require_once "api-handler.php";

$apiHandler = new APIHandler();

$users = $apiHandler->getUsers();
echo "\n" . "Пользователи:" . "\n";
echo $users . "\n";

$userId = 3;
$posts = $apiHandler->getPostsByUser($userId);
echo "\n" . "Посты пользователя {$userId}:" . "\n";
echo $posts . "\n";

$tasks = $apiHandler->getTasksForUser($userId);
echo "\n" . "Задания пользователя {$userId}:" . "\n";
echo $tasks . "\n";
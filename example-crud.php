<?php
require_once "api-handler.php";

$apiHandler = new APIHandler();

$userId = 3;
$postData = array(
    'title' => 'Breaking News',
    'body' => 'A wonderful day today.',
    'userId' => $userId
);
$createdPost = $apiHandler->createPost($postData);
$response = json_decode($createdPost, true);
echo "\n" . "Добавлен пост {$response['id']}:" . "\n";
echo $createdPost . "\n";

$postId = 3;
$updatedPost = $apiHandler->updatePost($postId, $postData);
echo "\n" . "Изменён пост {$postId}:" . "\n";
echo $updatedPost . "\n";

$isDeleted = $apiHandler->deletePost($postId);
echo "\n" . "Удалён пост {$postId}:" . "\n";
echo $isDeleted ? "true" : "false" . "\n";
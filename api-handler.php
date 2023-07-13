<?php
class APIHandler {
    private $baseUrl = 'https://jsonplaceholder.typicode.com';

    public function getUsers() {
        $url = $this->baseUrl . '/users';
        return file_get_contents($url);
    }

    public function getPostsByUser($userId) {
        $url = $this->baseUrl . '/posts?userId=' . $userId;
        return file_get_contents($url);
    }

    public function getTasksForUser($userId) {
        $url = $this->baseUrl . '/todos?userId=' . $userId;
        return file_get_contents($url);
    }

    public function createPost($postData) {
        $url = $this->baseUrl . '/posts';
        $options = array(
            'http' => array(
                'method' => 'POST',
                'header' => 'Content-Type: application/json',
                'content' => json_encode($postData)
            )
        );
        $context = stream_context_create($options);
        return file_get_contents($url, false, $context);
    }

    public function updatePost($postId, $postData) {
        $url = $this->baseUrl . '/posts/' . $postId;
        $options = array(
            'http' => array(
                'method' => 'PUT',
                'header' => 'Content-Type: application/json',
                'content' => json_encode($postData)
            )
        );
        $context = stream_context_create($options);
        return file_get_contents($url, false, $context);
    }

    public function deletePost($postId): bool
    {
        $url = $this->baseUrl . '/posts/' . $postId;
        $options = array(
            'http' => array(
                'method' => 'DELETE'
            )
        );
        $context = stream_context_create($options);
        $response = file_get_contents($url, false, $context);
        return $response !== false;
    }
}
<?php
require_once 'controllers.php';

// Route
if ($_SERVER['REQUEST_URI'] === '/new' && $_SERVER['REQUEST_METHOD'] === 'GET') {
  $controller = new Controller(new Model005);
  $response = $controller->newAction();
} else if ($_SERVER['REQUEST_URI'] === '/new' && $_SERVER['REQUEST_METHOD'] === 'POST') {
  $controller = new Controller(new Model005);
  $response = $controller->createAction($_POST);
} else {
  // 404; not implemented
  exit;
}

// Send response
// Assumes response in the form of ['headers' => [...], 'body' => ...].
foreach ($response['headers'] as $header) {
  header($header);
}
echo $response['body'];

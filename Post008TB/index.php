<?php
error_reporting(E_ALL);
require_once 'controllers.php';
require_once 'view.php';

// Route
if ($_SERVER['REQUEST_URI'] === '/new' && $_SERVER['REQUEST_METHOD'] === 'GET') {
  $model = new Model008();
  $view = new View('newThing.html.php', $model);

} else if ($_SERVER['REQUEST_URI'] === '/new' && $_SERVER['REQUEST_METHOD'] === 'POST') {
  $model = new Model008();
  $controller = new CreateController($model);
  $controller->createAction($_POST);
  $view = new View('newThing.html.php', $model);
} else {
  // 404; not implemented
  echo sprintf("404 Not Found %s",$_SERVER['REQUEST_URI']);
  exit;
}
$response = $view->render();

// Send response
// Assumes response in the form of ['headers' => [...], 'body' => ...].
foreach ($response['headers'] as $header) {
  header($header);
}
echo $response['body'];

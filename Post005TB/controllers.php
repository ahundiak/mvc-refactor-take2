<?php
require_once 'model.php';

class Controller
{
  private $model;

  public function __construct(Model005 $model) {
    $this->model = $model;
  }

  public function newAction()
  {
    return ['headers' => [], 'body' => $this->render('newThing.html.php')];
  }

  public function createAction($post)
  {
    $violations = $this->model->validateThing($post);
    if (empty($violations)) { // if valid
      $this->model->insertThing($post);

      return ['headers' => ['Location: /somewhere-else'], 'body' => ''];
    } // <-- discourse indentation bug

    // Otherwise, not valid
    return ['headers' => [], 'body' => $this->render('newThing.html.php', ['entity' => $post, 'violations' => $violations])];
  }


  public function render($template, $params = [])
  {
    extract($params);

    ob_start();
    require $template; // <-- another discourse indentation bug
    $content = ob_get_clean();

    return $content;
  }
}

<?php
require_once 'model.php';

class CreateController {
  private $model;

  public function __construct(Model $model) {
    $this->model = $model;
  }
  public function createAction($post)
  {
    if ($this->model->insertThing($post)) {
      $this->model->success();
    }
  }
}

<?php
require_once 'model.php';

// Shows a form to create a "thing"
function newAction()
{
  return ['headers' => [], 'body' => render('newThing.html.php')];
}

function createAction($post)
{
  $violations = validateThing($post);
  if (empty($violations)) { // if valid
    insertThing($post);

    return ['headers' => ['Location: /somewhere-else'], 'body' => ''];
  } // <-- discourse indentation bug
  // Otherwise, not valid
  return ['headers' => [], 'body' => render('newThing.html.php', ['entity' => $post, 'violations' => $violations])];
}

// Utility function: Render a PHP template with params and returns the result
function render($template, $params = [])
{
  extract($params);

  ob_start();
  require $template; // <-- another discourse indentation bug
  $content = ob_get_clean();

  return $content;
}

<?php
class Model005
{
  public function validateThing($entity)
  {
    $violations = [];

    // Pretend both are required
    if (!isset($entity['field1']) || $entity['field1'] === '') {
      $violations[] = 'Field 1 is required.';
    }
    if (!isset($entity['field2']) || $entity['field2'] === '') {
      $violations[] = 'Field 2 is required.';
    }

    // Pretend field 2 requires at least 3 chars
    if (strlen($entity['field2']) < 3) {
      $violations[] = 'Field 2 must have at least 3 characters.';
    }

    return $violations;
  }

  public function insertThing($entity)
  {
    // Pretend insert SQL
  }
}

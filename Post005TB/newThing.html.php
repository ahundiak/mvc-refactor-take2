<?php if (!empty($violations)): ?>
  <ul>
    <?php foreach ($violations as $violation): ?>
      <li><?= htmlspecialchars($violation) ?></li>
    <?php endforeach ?>
  </ul>
<?php endif ?>
<form action="/new" method="post">
  <label>Field 1 <input name="field1" value="<?= isset($entity) ? htmlspecialchars($entity['field1']) : '' ?>"></label>
  <label>Field 2 <input name="field2" value="<?= isset($entity) ? htmlspecialchars($entity['field2']) : '' ?>"></label>
  <input type="submit">
</form>

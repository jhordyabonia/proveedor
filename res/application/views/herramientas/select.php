
<?php foreach ($datos as $valor): ?>
    <option title="<?= $valor->nombre ?>"
        value="<?= $valor->id ?>"><?= $valor->nombre ?></option>
<?php endforeach; ?>

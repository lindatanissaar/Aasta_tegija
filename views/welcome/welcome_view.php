<h1><?= __("Form") ?> '<?= $form['form_name'] ?>'</h1>
<table class="table table-bordered">

    <tr>
        <th><?= __("Form") ?> ID</th>
        <td><?= $form['form_id'] ?></td>
    </tr>

    <tr>
        <th><?= __("Form") ?><?= __("name") ?></th>
        <td><?= $form['form_name'] ?></td>
    </tr>

</table>

<!-- EDIT BUTTON -->
<?php if ($auth->is_admin): ?>
    <form action="forms/edit/<?= $form['form_id'] ?>">
        <div class="pull-right">
            <button class="btn btn-primary">
                <?= __("Edit") ?>
            </button>
        </div>
    </form>
<?php endif; ?>
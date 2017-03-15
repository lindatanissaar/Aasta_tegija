<h1><?= __("Practical_test") ?> '<?= $practical_test['practical_test_name'] ?>'</h1>
<table class="table table-bordered">

    <tr>
        <th><?= __("Practical_test") ?> ID</th>
        <td><?= $practical_test['practical_test_id'] ?></td>
    </tr>

    <tr>
        <th><?= __("Practical_test") ?><?= __("name") ?></th>
        <td><?= $practical_test['practical_test_name'] ?></td>
    </tr>

</table>

<!-- EDIT BUTTON -->
<?php if ($auth->is_admin): ?>
    <form action="practical_tests/edit/<?= $practical_test['practical_test_id'] ?>">
        <div class="pull-right">
            <button class="btn btn-primary">
                <?= __("Edit") ?>
            </button>
        </div>
    </form>
<?php endif; ?>
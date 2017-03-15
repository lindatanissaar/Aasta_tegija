<h1><?= __("Practical_test_preview") ?> '<?= $practical_test_preview['practical_test_preview_name'] ?>'</h1>
<table class="table table-bordered">

    <tr>
        <th><?= __("Practical_test_preview") ?> ID</th>
        <td><?= $practical_test_preview['practical_test_preview_id'] ?></td>
    </tr>

    <tr>
        <th><?= __("Practical_test_preview") ?><?= __("name") ?></th>
        <td><?= $practical_test_preview['practical_test_preview_name'] ?></td>
    </tr>

</table>

<!-- EDIT BUTTON -->
<?php if ($auth->is_admin): ?>
    <form action="practical_tests_previews/edit/<?= $practical_test_preview['practical_test_preview_id'] ?>">
        <div class="pull-right">
            <button class="btn btn-primary">
                <?= __("Edit") ?>
            </button>
        </div>
    </form>
<?php endif; ?>
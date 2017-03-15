<?php if (!$auth->is_admin): ?>
    <div class="alert alert-danger fade in">
        <button class="close" data-dismiss="alert">×</button>
        You are not an administrator.
    </div>
    <?php exit(); endif; ?>
<h1>Practical_test '<?= $practical_test['practical_test_name'] ?>'</h1>
<form id="form" method="post">
    <table class="table table-bordered">
        <tr>
            <th><?= __('Practical_test name') ?></th>
            <td><input type="text" name="data[practical_test_name]" value="<?= $practical_test['practical_test_name'] ?>"/></td>
        </tr>
    </table>
</form>

<!-- BUTTONS -->
<div class="pull-right">

    <!-- CANCEL -->
    <button class="btn btn-default"
            onclick="window.location.href = 'practical_tests/view/<?= $practical_test['practical_test_id'] ?>/<?= $practical_test['practical_testname'] ?>'">
        <?= __("Cancel") ?>
    </button>

    <!-- DELETE -->
    <button class="btn btn-danger" onclick="delete_practical_test(<?= $practical_test['practical_test_id'] ?>)">
        <?= __("Delete") ?>
    </button>

    <!-- SAVE -->
    <button class="btn btn-primary" onclick="$('#form').submit()">
        <?= __("Save") ?>
    </button>

</div>
<!-- END BUTTONS -->

<!-- JAVASCRIPT
==============================================================================-->
<script type="application/javascript">
    function delete_practical_test() {
        $.post('<?=BASE_URL?>practical_tests/delete', {practical_test_id: <?= $practical_test['practical_test_id'] ?>}, function (response) {
            if(response == 'Ok'){
                window.location.href = '<?=BASE_URL?>practical_tests';
            }
        })
    }
</script>
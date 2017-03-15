<?php if (!$auth->is_admin): ?>
    <div class="alert alert-danger fade in">
        <button class="close" data-dismiss="alert">×</button>
        You are not an administrator.
    </div>
    <?php exit(); endif; ?>
<h1>Practical_test_preview '<?= $practical_test_preview['practical_test_preview_name'] ?>'</h1>
<form id="form" method="post">
    <table class="table table-bordered">
        <tr>
            <th><?= __('Practical_test_preview name') ?></th>
            <td><input type="text" name="data[practical_test_preview_name]" value="<?= $practical_test_preview['practical_test_preview_name'] ?>"/></td>
        </tr>
    </table>
</form>

<!-- BUTTONS -->
<div class="pull-right">

    <!-- CANCEL -->
    <button class="btn btn-default"
            onclick="window.location.href = 'practical_tests_previews/view/<?= $practical_test_preview['practical_test_preview_id'] ?>/<?= $practical_test_preview['practical_test_previewname'] ?>'">
        <?= __("Cancel") ?>
    </button>

    <!-- DELETE -->
    <button class="btn btn-danger" onclick="delete_practical_test_preview(<?= $practical_test_preview['practical_test_preview_id'] ?>)">
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
    function delete_practical_test_preview() {
        $.post('<?=BASE_URL?>practical_tests_previews/delete', {practical_test_preview_id: <?= $practical_test_preview['practical_test_preview_id'] ?>}, function (response) {
            if(response == 'Ok'){
                window.location.href = '<?=BASE_URL?>practical_tests_previews';
            }
        })
    }
</script>
<?php if (!$auth->is_admin): ?>
    <div class="alert alert-danger fade in">
        <button class="close" data-dismiss="alert">×</button>
        You are not an administrator.
    </div>
    <?php exit(); endif; ?>
<h1>Form '<?= $form['form_name'] ?>'</h1>
<form id="form" method="post">
    <table class="table table-bordered">
        <tr>
            <th><?= __('Form name') ?></th>
            <td><input type="text" name="data[form_name]" value="<?= $form['form_name'] ?>"/></td>
        </tr>
    </table>
</form>

<!-- BUTTONS -->
<div class="pull-right">

    <!-- CANCEL -->
    <button class="btn btn-default"
            onclick="window.location.href = 'forms/view/<?= $form['form_id'] ?>/<?= $form['formname'] ?>'">
        <?= __("Cancel") ?>
    </button>

    <!-- DELETE -->
    <button class="btn btn-danger" onclick="delete_form(<?= $form['form_id'] ?>)">
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
    function delete_form() {
        $.post('<?=BASE_URL?>forms/delete', {form_id: <?= $form['form_id'] ?>}, function (response) {
            if(response == 'Ok'){
                window.location.href = '<?=BASE_URL?>forms';
            }
        })
    }
</script>
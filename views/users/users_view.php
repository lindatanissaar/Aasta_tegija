<h1>User '<?= $user['user_name'] ?>'</h1>
<table class="table table-bordered">
    <tr>
        <th>Username</th>
        <td><?= $user['user_name'] ?></td>
    </tr>
    <?php if ($auth->is_admin): ?>
        <tr>
            <th>Password</th>
            <td><?= $user['password'] ?></td>
        </tr>
    <?php endif; ?>
    <tr>
        <th>Email</th>
        <td><?= $user['email'] ?></td>
    </tr>
</table>

<!-- EDIT BUTTON -->
<?php if ($auth->is_admin): ?>
    <form action="users/edit/<?= $user['user_id'] ?>">
        <div class="pull-right">
            <button class="btn btn-primary">
                Edit
            </button>
        </div>
    </form>
<?php endif; ?>
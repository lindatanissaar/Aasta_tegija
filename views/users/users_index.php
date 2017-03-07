<style>
    #btnSubmit {

    }
</style>
<?php if ($auth->is_admin): ?>

<a class="btn btn-primary btn-lg" href="logout">Logi välja</a>

<h3>Add new user</h3>

<form method="post" id="form">
    <form id="form" method="post">
        <table class="table table-bordered">
            <tr>
                <th>Username</th>
                <td><input type="text" name="data[user_name]" placeholder="Jaan"/></td>
            </tr>
            <tr>
                <th>Password</th>
                    <td><input type="text" name="data[password]" placeholder="******"/></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><input type="text" name="data[email]" placeholder="em@ail.ee">
            </tr>
        </table>

        <button class="btn btn-primary" type="submit">Add</button>
    </form>
    <?php endif; ?>



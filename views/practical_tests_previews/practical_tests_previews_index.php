<style>

    .center {
        margin: auto;
        width: 50%;
    }

</style>
<script>
    history.pushState(null, null, document.URL);
    window.addEventListener('popstate', function () {
        history.pushState(null, null, document.URL);
    });
</script>

<div class="center">
    <h1>Praktiline test</h1>

    <br>
    <?= $practical_test['practical_text'] ?>
</div>

<div class="center">
    <br/>
    <form>

        <div class="row">
            <div class="col-5">
                <input align="right" type="button" id="goHome" class="btn btn-primary btn-lg" value="Lõpeta">
            </div>
            <div class="col-2">

                <br>
                <?php
                $str = $practical_test_preview['practical_test_answer'];
                echo htmlspecialchars_decode($str);
                ?>

            </div>
        </div>
    </form>

    <?php
    $practical_id = $practical_test['practical_id'];
    echo "$practical_id";
    ?>
</div>

<script type="text/javascript">

    $('#goHome').click(function () {
        session_destroy();
        header('Location: users');
        exit();
    })

</script>
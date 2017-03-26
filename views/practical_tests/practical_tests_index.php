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
    <?= $practical_test['practical_text']; ?>

</div>

<div class="center">
    <br/>
    <form>
        <textarea rows="15" cols="100" name="btn btn-outline-primary" id="practical_test_answer">
            <!DOCTYPE html>
            <html>
                <body>

                  <?php echo "<--kirjuta oma vastus siia-->";?>

                </body>
            </html>
        </textarea>
        <br>
        <input type="button" id="sendAnswer" class="btn btn-primary btn-lg" value="Edasta!">
    </form>

    <?php
    $practical_id = $practical_test['practical_id'];
    ?>

</div>
<script type="text/javascript">

    $(function () {
        $('#sendAnswer').click(function () {
            //make vars for posting
            var practical_test_answer = $("#practical_test_answer").val();
            var user_id = <?= $_SESSION["user_id"] ?>;
            var prtactical_test_id = <?= $practical_test['practical_id'] ?>;
            // post vars
            $.post("practical_tests/practicalTestAnswer", {user_id: user_id,
                prtactical_test_id: prtactical_test_id,
                practical_test_answer: practical_test_answer}).done(function (data) {
                if (data == "success") {
                    location.href = "practical_tests_previews";
                } else {
                    alert("Midagi läks valesti!");
                }
            });
        });
    });

</script>
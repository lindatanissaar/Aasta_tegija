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
    <?php //print_r($_SESSION); ?>
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
    //echo "$practical_id";
    ?>
</div>

<script type="text/javascript">

    $(function () {
        $('#sendAnswer').click(function () {
            var pin = '<?=$_SESSION['pin']?>';
            var questions_result = '<?=$_SESSION['questions_result']?>';
            var practical_test_answer = $("#practical_test_answer").val();
            var practical_question_id = '<?=$practical_test['practical_id']?>';
            $.post("practical_tests/practicalTestAnswer", {
                pin: pin,
                questions_result: questions_result,
                practical_test_answer: practical_test_answer,
                practical_question_id: practical_question_id
            }).done(function (data) {
                if (data == "success") {
                    location.href = "practical_tests_previews"
                } else {
                    alert("Sisestasid vale isikukoodi. Sellist kasutajat ei ole andmebaasis!")
                }
            });
        });
    });

</script>
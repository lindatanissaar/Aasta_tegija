<style>
    .center {
        margin: auto;
        width: 50%;
    }
    #btn {
        background-color: #003a73;
        color: white;
        margin-left: 25%;
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


        <div class="col-2">

            <br>
            <?php
            /// kasuta seda
            $value = (int)$_GET["pin"];
            $_SESSION ['pin'] = $value;
            print_r($_SESSION);
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

<button type="button" class="btn btn-lg" id="btn" data-toggle="modal" data-target="#popUpWindow5">LÕPETA</button>

<div class="modal fade" id="popUpWindow5">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- header -->
            <div class="modal-header">
                <img src="assets/images/KHK_logo.png" />
                <h3 class="modal-title">Palju õnne! <br>Oled edukalt läbinud ülesanded :)</h3>
            </div>

            <script type="text/javascript">
                $('#goHome').click(function () {
                    session_destroy();
                    header('Location: welcome');
                    exit();
                })
            </script>
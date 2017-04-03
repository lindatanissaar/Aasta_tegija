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

    <br/>


        <div class="col-2">

            <?= $practical_test_preview['practical_test_answer'] ; ?>

        </div>
</div>

<button type="button" class="btn btn-lg" id="btn" data-toggle="modal" data-target="#popUpWindow5">LÕPETA</button>

<div class="modal fade" id="popUpWindow5">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- header -->
            <div class="modal-header">
                <img src="assets/images/KHK_logo.png" />
                <h3 class="modal-title">Palju õnne! <br>Oled edukalt läbinud ülesanded :)</h3>
                <br>
                <button id="goHome">Lõpeta</button>
            </div>
            </div>

<script type="text/javascript">

    $('#goHome').click(function () {
        location.href="logout2";
    })

</script>
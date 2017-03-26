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
<br/>
<div class="center">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1 class="panel-title"></h1>
            <h1>Praktiline test</h1>
            <h2>sinu vastus sai selline:</h2>
        </div>
        <div class="panel-body">
            <br>
            <?php
            echo htmlspecialchars_decode($practical_test_preview['practical_test_answer']);
            ?>
            <br>
        </div>
    </div>
    <br/>
</div>

</form>
<button type="button" class="btn btn-lg" id="btn" data-toggle="modal" data-target="#popUpWindow5">LÕPETA</button>

<div class="modal fade" id="popUpWindow5">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- header -->
            <div class="modal-header">
                <img src="assets/images/KHK_logo.png"/>
                <h3 class="modal-title">Palju õnne! <br>Oled edukalt läbinud ülesanded :)</h3>
            </div>

            <!-- button -->
            <div class="modal-footer">
                <a id="logOutBtn" class="btn btn-primary btn-block" href="logout2">Välju</a>
            </div>
        </div>
    </div>
</div>


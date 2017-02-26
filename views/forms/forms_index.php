<p>Siin keskkonnas saad Sa testida oma CSS'i ja HTML-i oskusi. Test koosneb teoreetilisest ja praktilisest osast. Teoreetilises osas tuleb Sul vastata kümnele küsimusele.
    Tegemist on valikvastustega küsimustega, kus ainult üks vastus on õige. Pärast teoreetilist osa tuleb Sul lahendada praktiline ülesanne.</p>

<!-- data-toggle lets you display modal without any JavaScript -->
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#popUpWindow">Mine registreerimislehele!</button>

<div class="modal fade" id="popUpWindow">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Registreeri</h3>
            </div>

            <!-- body (form) -->
            <div class="modal-body">
                <form role="form" action="insert.php" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Eesnimi" name="eesnimi">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Perenimi" name="perenimi">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Isikukood" name="isikukood">
                    </div>
                </form>
            </div>

            <!-- button -->
            <div class="modal-footer">
                <button class="btn btn-primary btn-block">Edasta!</button>
            </div>


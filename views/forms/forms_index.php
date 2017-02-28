<style>
    input[name="firstName"], input[name="lastName"]{
        text-transform: capitalize;
    }
</style>

<script>
    var id_length;
    var validate = function(){
        invalid=0;
        id_length = document.myForm.pin.value.length;

        // firstName validation
        if(document.myForm.firstName.value==""){
            alert("Eesnime lahter peab olema täidetud!");
            invalid++;
        }

        if(!/^[-\sa-zA-Z]+$/.test(document.myForm.firstName.value)) {
            alert("Eesnimi võib sisaldada ainult tähti, tühikut ja sidekriipsu!");
            return;
        }

        // lastName validation
        if(document.myForm.lastName.value=="") {
            alert("Perenime lahter peab olema täidetud!");
            invalid++;
        }

        if(!/^[-\sa-zA-Z]+$/.test(document.myForm.lastName.value)) {
            alert("Perenimi võib sisaldada ainult tähti, tühikut ja sidekriipsu!");
            return;
        }

        // id validation
        if(document.myForm.pin.value==""){
            alert("Isikukoodi lahter peab olema täidetud!");
            invalid++;
        }

        if(id_length != 11) {
            alert("Sisestatud ID-s pole õige arv numbreid!");
            invalid++;
        }

        if(document.myForm.pin.value.match(/^[0-9]+$/) == null) {
            alert("Sisestasid mitte numbri!");
        }

        // final validation
        if(invalid!=0){
            return false;
        }else{
            return true;
        }
    }
</script>

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
                <form role="form" action="insert.php" method="post" name="myForm">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Eesnimi" name="firstName" >
                    </div>
                    <script></script>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Perenimi" name="lastName">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Isikukood" name="pin">
                    </div>
                </form>
            </div>

            <!-- button -->
            <div class="modal-footer">
                <button class="btn btn-primary btn-block" onClick="return validate()">Edasta!</button>
            </div>
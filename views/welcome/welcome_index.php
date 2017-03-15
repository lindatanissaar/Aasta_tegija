<style>
    input[name="firstName"], input[name="lastName"]{
        text-transform: capitalize;
    }

    p, h3, .btn-lg {
        margin-right: 25%;
        margin-left: 25%;
    }

    h3 {
        margin-top: 80px;
        margin-bottom: 20px;
    }

    .btn-lg {
        margin-top: 30px;
        background-color: #0054a6;
        border-color: #0054a6;
        text-align: center;
        color: white;
    }

    .btn-lg:hover {
        background-color: #003a73;
        border-color: #003a73;
        color: white;
    }

    .btn-lg:active {
        background-color: #003a73;
        border-color: #003a73;
        color: white;
    }

    #btnSubmit{
        background-color: #0054a6;
        border-color: #0054a6;
        color: white;
    }

    .modal-header {
        background-color: #FFE600;
    }

    #alertText {
        color: red;
        font-weight: bold;
        margin-right: 10%;
        margin-left: 10%;
    }


</style>

<script>
    var id_length;
    var validate = function(){
        invalid=0;
        id_length = document.myForm.pin.value.length;

        // firstName validation
        if(document.myForm.firstName.value==""){
            document.getElementById('alertText').innerHTML = "Eesnime lahter peab olema täidetud!";
            invalid++;
        }

        if(!/^[-\sa-zA-Z]+$/.test(document.myForm.firstName.value)) {
            document.getElementById('alertText').innerHTML = "Eesnimi võib sisaldada ainult tähti, tühikut ja sidekriipsu!";
            return;
        }

        // lastName validation
        if(document.myForm.lastName.value=="") {
            document.getElementById('alertText').innerHTML = "Perenime lahter peab olema täidetud!";
            invalid++;
        }

        if(!/^[-\sa-zA-Z]+$/.test(document.myForm.lastName.value)) {
            document.getElementById('alertText').innerHTML = "Perenimi võib sisaldada ainult tähti, tühikut ja sidekriipsu!";
            return;
        }

        // id validation
        if(document.myForm.pin.value==""){
            document.getElementById('alertText').innerHTML = "Isikukoodi lahter peab olema täidetud!";
            invalid++;
        }

        if(id_length != 11) {
            document.getElementById('alertText').innerHTML = "Sisestatud ID-s pole õige arv numbreid!";
            invalid++;
        }

        if(document.myForm.pin.value.match(/^[0-9]+$/) == null) {
            document.getElementById('alertText').innerHTML = "Sisestasid mitte numbri!";
        }

        // final validation
        if(invalid!=0){
            return false;
        }else{
            return true;
        }
    }
</script>

<div class="content">

    <h3>Tere tulemast Tartu KHK IKT õpikeskkonda!</h3>

    <p>Siin keskkonnas saad Sa testida oma CSS'i ja HTML-i oskusi. Test koosneb teoreetilisest ja praktilisest osast. Teoreetilises osas tuleb Sul vastata kümnele küsimusele.
        Tegemist on valikvastustega küsimustega, kus ainult üks vastus on õige. Pärast teoreetilist osa tuleb Sul lahendada praktiline ülesanne.</p>

    <!-- data-toggle lets you display modal without any JavaScript -->
    <button type="button" class="btn btn-lg" data-toggle="modal" data-target="#popUpWindow">Mine registreerimislehele!</button>

    <div class="modal fade" id="popUpWindow">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- header -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title">Registreeri</h3>
                    <p id="alertText"></p>
                </div>

                <!-- body (form) -->
                <div class="modal-body">
                    <form role="form"  name="myForm">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Eesnimi" name="firstName" id="firstName" >
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Perenimi" name="lastName" id="lastName">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Isikukood" name="pin" id="pin">
                        </div>
                    </form>
                </div>

                <!-- button -->
                <div class="modal-footer">
                    <input type="button" id="btnSubmit" class="btn btn-primary btn-block" onClick="return validate()" value="Edasta!">
                </div>
            </div>
        </div>
    </div>

            <script>

               $(function(){
                   $('#btnSubmit').click(function(){
                       var firstName = $("#firstName").val();
                       var lastName = $("#lastName").val();
                       var pin = $("#pin").val();
                       $.post("welcome/enterantsLogin", {pin: pin}).done(function(data){
                           if(data=="success"){
                               location.href="welcome" + "?pin=" + pin;
                           }else{
                               alert("Sisestasid vale isikukoodi. Sellist kasutajat ei ole andmebaasis!")
                           }
                       });
                   });
               });
            </script>


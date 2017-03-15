<h1>Welcome!</h1>
<!-- Code for ajax -->
<script type="text/javascript">
    function clickme() {
        $.post("welcome", $("#ajax-form").serialize(), function (data) {
            $(".result").html(data);
        });
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
                               location.href="questions" + "?pin=" + pin;
                           }else{
                               alert("Sisestasid vale isikukoodi. Sellist kasutajat ei ole andmebaasis!")
                           }
                       });
                   });
               });
            </script>


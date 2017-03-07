<style>
    #form, #btnSubmit, #btnSubmit2 {
        width: 40%;
    }

    #alertText{
        color: red;
    }
</style>
<?php if ($auth->is_admin): ?>

<h3>Lisa õpilane</h3>

<div id="alertText"></div>

<form method="post" id="form">
    <form id="form" method="post">
        <form role="form" name="myForm">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Eesnimi" name="firstName" id="firstName">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Perenimi" name="lastName" id="lastName">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Isikukood" name="pin" id="pin">
            </div>
        </form>

        <input type="button" id="btnSubmit" class="btn btn-primary btn-block" value="Lisa!">
    </form>

    <script>

        $(function () {
            $('#btnSubmit').click(function () {
                var firstName = $("#firstName").val();
                var lastName = $("#lastName").val();
                var pin = $("#pin").val();
                $.post("users/addingEnterants", {
                    firstName: firstName,
                    lastName: lastName,
                    pin: pin
                }).done(function (data) {
                    if (data == "success") {
                        location.href = "users"
                        document.getElementById('alertText').innerHTML = "Uus kasutaja lisatud"

                    } else {
                        alert("Error!")
                    }
                });
            });
        });
    </script>


    <h3>Lisa uus admin</h3>

    <div id="alertText"></div>

    <form method="post" id="form">
        <form id="form" method="post">
            <form role="form" name="myForm">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Email" name="email" id="email">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Parool" name="password" id="password">
                </div>
            </form>

            <input type="button" id="btnSubmit2" class="btn btn-primary btn-block" value="Lisa!">
        </form>

        <script>

            $(function () {
                $('#btnSubmit2').click(function () {
                    var email = $("#email").val();
                    var password = $("#password").val();
                    $.post("users/addingAdmins", {
                        email: email,
                        password: password
                    }).done(function (data) {
                        if (data == "success") {
                            location.href = "users"
                            document.getElementById('alertText').innerHTML = "Uus admin lisatud"

                        } else {
                            alert("Error!")
                        }
                    });
                });
            });
        </script>
    <?php endif; ?>



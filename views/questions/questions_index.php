<html>
<head>
    <meta charset="ISO-8859-1">
    <style type='text/css'>
        #wrapper {
            width: 950px;
            height: auto;
            padding: 13px;
            margin-right: auto;
            margin-left: auto;
            background-color: lightblue;
        }

        label {
            background-color: lightblue;
        }

        h3 {
            text-shadow: 1px 1px 25px black;
            font-weight: bold;
        }

        center {
            text-shadow: 1px 1px 5px black;
            font-size: 50px;
            padding-top: 25px;
        }
    </style>
</head>
<body bgcolor='#e1e1e1'>
<div id='wrapper'>

    <center>Teoreetilised Küsimused</center>
    <br/>
    <br/>
    <br/><br/>
    <form action='process' method='post' id='quizForm' id='$number[1]'>
        <ol>
            <?php foreach ($questions as $question_id => $question): ?>

                <li>
                    <h3><?= $question['text'] ?> </h3>

                    <?php foreach ($question['answers'] as $answer): ?>
                        <div>
                            <input type='radio' name='answers[<?= $question_id ?>]' id='answernumber' value='A'/>
                            <label for='answerOneA'> <?= $answer['text'] ?> </label>
                        </div>
                    <?php endforeach ?>

                </li>

            <?php endforeach ?>
        </ol>
        <input type="submit" id="btnSubmit" class="btn btn-primary btn-block" onClick="return validate()"
               value="Edasta!">
</div>
</body>
<script>
    $(function () {
        $('#submit').click(function () {
            var pin = $("#pin").val();
            $.post("theoretical", {pin: pin}).done(function (data) {
                if (data == "success") {
                    location.href = "theoretical";
                } else {
                    alert("Sisestasid vale isikukoodi. Sellist kasutajat ei ole andmebaasis!")
                }
            });
        });
    });
</script>
</html>

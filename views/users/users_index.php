<style>
    .content {
        margin-right: 7%;
        margin-left: 7%;
    }
    .btn-lg {
        background-color: #0054a6;
        border-color: #0054a6;
        text-align: center;
        color: white;
        margin-top: 30px;
        margin-right: 60px;
        margin-bottom: 60px;
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
    .modal-header {
        background-color: #FFE600;
    }
    #alertText1, #alertText2 {
        color: red;
    }
    input[name="firstName"], input[name="lastName"] {
        text-transform: capitalize;
    }
    h3 {
        border-bottom: #003a73 solid 2px;
        padding-bottom: 10px;
        width: 40%;
    }
    h3:hover {
        cursor: pointer;
    }
    #questions, #answers, #practical, #ranking, #rankingRight {
        display: none;
    }
</style>

<?php if ($auth->is_admin): ?>

    <script>
        // toggle questions' table when clicked on heading
        $(document).ready(function () {
            $("#questions_OnClick").click(function () {
                $("#questions").toggle();
            });
        });
        // toggle answers' table when clicked on heading
        $(document).ready(function () {
            $("#answers_OnClick").click(function () {
                $("#answers").toggle();
            });
        });
        // toggle practical questions' table when clicked on heading
        $(document).ready(function () {
            $("#practical_OnClick").click(function () {
                $("#practical").toggle();
            });
        });
        // toggle ranking table when clicked on heading
        $(document).ready(function () {
            $("#ranking_OnClick").click(function () {
                $("#ranking").toggle();
            });
        });
    </script>


    <div class="content">

        <button type="button" class="btn btn-lg" data-toggle="modal" data-target="#popUpWindow1">Lisa õpilane</button>

        <div class="modal fade" id="popUpWindow1">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- header -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h3 class="modal-title">Õpilase lisamine</h3>
                        <p id="alertText1"></p>
                    </div>

                    <!-- body (form) -->
                    <div class="modal-body">
                        <form role="form" name="myForm">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Eesnimi" name="firstName"
                                       id="firstName">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Perenimi" name="lastName"
                                       id="lastName">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Isikukood" name="pin" id="pin">
                            </div>
                        </form>
                    </div>

                    <!-- button -->
                    <div class="modal-footer">
                        <input type="button" id="btnSubmit1" class="btn btn-primary btn-block" value="Lisa uus õpilane">
                    </div>
                </div>
            </div>
        </div>


        <script>
            $(function () {
                // get values of firstName, lastName and pin
                $('#btnSubmit1').click(function () {
                    var firstName = $("#firstName").val();
                    var lastName = $("#lastName").val();
                    var pin = $("#pin").val();
                    // making $.post query
                    $.post("users/addingEnterants", {
                        firstName: firstName,
                        lastName: lastName,
                        pin: pin
                    }).done(function (data) {
                        // if response from server is successful, write "Uus kasutaja on lisatud", otherwise alert error
                        if (data == "success") {
                            document.getElementById('alertText1').innerHTML = "Uus kasutaja lisatud"
                        } else {
                            alert("Error!")
                        }
                    });
                });
            });
        </script>

        <button type="button" class="btn btn-lg" data-toggle="modal" data-target="#popUpWindow2">Lisa admin</button>

        <div class="modal fade" id="popUpWindow2">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- header -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h3 class="modal-title">Admini lisamine</h3>
                        <p id="alertText2"></p>
                    </div>

                    <!-- body (form) -->
                    <div class="modal-body">
                        <form role="form" name="myForm">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Email" name="email" id="email">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Parool" name="password"
                                       id="password">
                            </div>
                        </form>
                    </div>

                    <!-- button -->
                    <div class="modal-footer">
                        <input type="button" id="btnSubmit2" class="btn btn-primary btn-block" value="Lisa uus admin">
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(function () {
                // get values of email and password
                $('#btnSubmit2').click(function () {
                    var email = $("#email").val();
                    var password = $("#password").val();
                    // make $.post query
                    $.post("users/addingAdmins", {
                        email: email,
                        password: password
                    }).done(function (data) {
                        // if response from users/addingAdmins is successful, write "Uus kasutaja on lisatud", otherwise alert error
                        if (data == "success") {
                            document.getElementById('alertText1').innerHTML = "Uus admin lisatud"
                        } else {
                            alert("Error!")
                        }
                    });
                });
            });
        </script>

        <!--questions-->
        <h3 align="center" id="questions_OnClick">Lisa, kustuta ja muuda küsimust</h3><br/>
        <div class="table-responsive" id="questions">
            <div id="live_data2">
                <div class="table-responsive">
                    <table class="table table-bordered" width="80%">
                        <tr>
                            <th width="15%">Id</th>
                            <th width="70%">Tekst</th>
                            <th width="15%">Kustuta/Lisa</th>
                        </tr>

                        <?php foreach ($questions as $question): ?>
                            <tr>
                                <td><?= $question['question_id'] ?></td>
                                <td class="text" data-id1="<?= $question['question_id']; ?>"
                                    contenteditable><?= $question["text"]; ?></td>
                                <td>
                                    <button type="button" name="delete_btn" data-id3="<?= $question['question_id']; ?>"
                                            class="btn btn-xs btn-danger btn_delete2"
                                            style="background-color: #FFE600; border-color: #FFE600">x
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td></td>
                            <td id="text" contenteditable></td>
                            <td>
                                <button type="button" name="btn_add" id="btn_add2" class="btn btn-xs btn-success"
                                        style="background-color: #0054a6; border-color: #0054a6">+
                                </button>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <script>
            // get text's value and send it with $.ajax POST query to users/insertingQuestions
            $(document).ready(function () {
                $(document).on('click', '#btn_add2', function () {
                    var text = $('#text').text();
                    $.ajax({
                        url: "users/insertingQuestions",
                        method: "POST",
                        data: {text: text},
                        dataType: "text",
                        success: function (data) {
                            alert(data);
                        }
                    });
                });
                // make $.ajax POST query
                function edit_data(id, text, column_name) {
                    $.ajax({
                        url: "users/editingQuestions",
                        method: "POST",
                        data: {id: id, text: text, column_name: column_name},
                        dataType: "text",
                        success: function (data) {
                            alert(data);
                        }
                    });
                }
                $(document).on('blur', '.text', function () {
                    var id = $(this).data("id1");
                    var text = $(this).text();
                    edit_data(id, text, "text");
                });
                // get id value and send it with $.ajax POST query to users/deletingQuestions
                $(document).on('click', '.btn_delete2', function () {
                    var id = $(this).data("id3");
                    if (confirm("Are you sure you want to delete this?")) {
                        $.ajax({
                            url: "users/deletingQuestions",
                            method: "POST",
                            data: {id: id},
                            dataType: "text",
                            success: function (data) {
                                alert(data);
                            }
                        });
                    }
                });
            });
        </script>

        <!--answer-->

        <h3 align="center" id="answers_OnClick">Lisa, kustuta ja muuda vastust</h3><br/>
        <div class="table-responsive" id="answers">
            <div id="live_data3">
                <div class="table-responsive">
                    <table class="table table-bordered" width="80%">
                        <tr>
                            <th width="20%">Id</th>
                            <th width="20%">Küsimuse_id</th>
                            <th width="20%">Tekst</th>
                            <th width="20%">Õige/väär</th>
                            <th width="20%">Kustuta/Lisa</th>
                        </tr>

                        <?php foreach ($answers as $answer): ?>
                            <tr>
                                <td><?= $answer['answer_id'] ?></td>
                                <td class="question_id" data-id1="<?= $answer['answer_id']; ?>"
                                    contenteditable><?= $answer["question_id"]; ?></td>
                                <td class="answer_text" data-id2="<?= $answer['answer_id']; ?>"
                                    contenteditable><?= $answer["answer_text"]; ?></td>
                                <td class="answer" data-id3="<?= $answer['answer_id']; ?>"
                                    contenteditable><?= $answer["answer"]; ?></td>
                                <td>
                                    <button type="button" name="delete_btn" data-id4="<?= $answer['answer_id']; ?>"
                                            class="btn btn-xs btn-danger btn_delete3"
                                            style="background-color: #FFE600; border-color: #FFE600">x
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td></td>
                            <td id="question_id" contenteditable></td>
                            <td id="answer_text" contenteditable></td>
                            <td id="answer" contenteditable></td>
                            <td>
                                <button type="button" name="btn_add" id="btn_add3" class="btn btn-xs btn-success"
                                        style="background-color: #0054a6; border-color: #0054a6">+
                                </button>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function () {
                // get values of question_id, answer_text and answer
                $(document).on('click', '#btn_add3', function () {
                    var question_id = $('#question_id').text();
                    var answer_text = $('#answer_text').text();
                    var answer = $('#answer').text();
                    // if question_id is empty, make an alert
                    if (question_id == '') {
                        alert("Enter Question Id");
                        return false;
                    }
                    // if answer_text is empty, make an alert
                    if (answer_text == '') {
                        alert("Enter text");
                        return false;
                    }
                    // if answer is empty, make an alert
                    if (answer == '') {
                        alert("Enter text");
                        return false;
                    }
                    // make $.ajax POST query
                    $.ajax({
                        url: "users/insertingAnswers",
                        method: "POST",
                        data: {question_id: question_id, answer_text: answer_text, answer: answer},
                        dataType: "text",
                        success: function (data) {
                            alert(data);
                        }
                    })
                });
                // make $.ajax POST query
                function edit_data(id, text, column_name) {
                    $.ajax({
                        url: "users/editingAnswers",
                        method: "POST",
                        data: {id: id, text: text, column_name: column_name},
                        dataType: "text",
                        success: function (data) {
                            alert(data);
                        }
                    });
                }
                $(document).on('blur', '.question_id', function () {
                    var id = $(this).data("id1");
                    var text = $(this).text();
                    edit_data(id, question_id, "question_id");
                });
                $(document).on('blur', '.answer_text', function () {
                    var id = $(this).data("id2");
                    var text = $(this).text();
                    edit_data(id, answer_text, "answer_text");
                });
                $(document).on('blur', '.answer', function () {
                    var id = $(this).data("id3");
                    var text = $(this).text();
                    edit_data(id, answer, "answer");
                });
                $(document).on('click', '.btn_delete3', function () {
                    var id = $(this).data("id4");
                    if (confirm("Are you sure you want to delete this?")) {
                        $.ajax({
                            url: "users/deletingAnswers",
                            method: "POST",
                            data: {id: id},
                            dataType: "text",
                            success: function (data) {
                                alert(data);
                            }
                        });
                    }
                });
            });
        </script>

        <!--practical-->

        <h3 align="center" id="practical_OnClick">Lisa, kustuta ja muuda praktilist küsimust</h3><br/>
        <div class="table-responsive" id="practical">
            <div id="live_data">
                <div class="table-responsive">
                    <table class="table table-bordered" width="80%">
                        <tr>
                            <th width="15%">Id</th>
                            <th width="70%">Tekst</th>
                            <th width="15%">Kustuta/Lisa</th>
                        </tr>

                        <?php foreach ($practicals as $practical): ?>
                            <tr>
                                <td><?= $practical['practical_id'] ?></td>
                                <td class="practical_text" data-id1="<?= $practical['practical_id']; ?>"
                                    contenteditable><?= $practical["practical_text"]; ?></td>
                                <td>
                                    <button type="button" name="delete_btn"
                                            data-id3="<?= $practical['practical_id']; ?>"
                                            class="btn btn-xs btn-danger btn_delete"
                                            style="background-color: #FFE600; border-color: #FFE600">x
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td></td>
                            <td id="practical_text" contenteditable></td>
                            <td>
                                <button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success"
                                        style="background-color: #0054a6; border-color: #0054a6">+
                                </button>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function () {
                $(document).on('click', '#btn_add', function () {
                    // get value of practical_text
                    var practical_text = $('#practical_text').text();
                    // if practical_text is empty, make an alert
                    if (practical_text == '') {
                        alert("Enter text");
                        return false;
                    }
                    // make $.ajax POST query
                    $.ajax({
                        url: "users/insertingPractical",
                        method: "POST",
                        data: {practical_text: practical_text},
                        dataType: "text",
                        success: function (data) {
                            alert(data);
                        }
                    })
                });
                // make $.ajax POST query
                function edit_data(id, text, column_name) {
                    $.ajax({
                        url: "users/editingPractical",
                        method: "POST",
                        data: {id: id, text: text, column_name: column_name},
                        dataType: "text",
                        success: function (data) {
                            alert(data);
                        }
                    });
                }
                $(document).on('blur', '.practical_text', function () {
                    var id = $(this).data("id1");
                    var practical_text = $(this).text();
                    edit_data(id, practical_text, "practical_text");
                });
                $(document).on('click', '.btn_delete', function () {
                    var id = $(this).data("id3");
                    if (confirm("Are you sure you want to delete this?")) {
                        $.ajax({
                            url: "users/deletingPractical",
                            method: "POST",
                            data: {id: id},
                            dataType: "text",
                            success: function (data) {
                                alert(data);
                            }
                        });
                    }
                });
            });
        </script>

        <!-- ranking-->

        <h3 align="center" id="ranking_OnClick">Hinda õpilaste praktilist tulemust</h3><br/>
        <div class="table-responsive" id="ranking">
            <div id="live_data4">
                <div class="table-responsive">
                    <table class="table table-bordered" width="80%">
                        <tr>
                            <th width="10%">LogiId</th>
                            <th width="10%">PIN</th>
                            <th width="20%">Teoreetiline tulemus</th>
                            <th width="20%">Praktiline ülesanne</th>
                            <th width="20%">Praktiline vastus</th>
                            <th width="10%">Praktiline tulemus</th>
                            <th width="10%">Kustuta/Lisa</th>
                        </tr>

                        <?php foreach ($logs as $log): ?>
                            <tr>
                                <td><?= $log['logs_id'] ?></td>
                                <td class="PIN" data-id1="<?= $log['logs_id']; ?>"
                                    contenteditable><?= $log["PIN"]; ?></td>
                                <td class="questions_result" data-id2="<?= $log['logs_id']; ?>"
                                    contenteditable><?= $log["questions_result"]; ?></td>
                                <td class="practical_test_question_id" data-id3="<?= $log['logs_id']; ?>"
                                    contenteditable><?= $log["practical_test_question_id"]; ?></td>
                                <td class="practical_test_answer" data-id4="<?= $log['logs_id']; ?>"
                                    contenteditable><?= $log["practical_test_answer"]; ?></td>
                                <td class="practical_test_points" data-id5="<?= $log['logs_id']; ?>"
                                    contenteditable><?= $log["practical_test_points"]; ?></td>
                                <td>
                                    <button type="button" name="delete_btn" data-id6="<?= $log['logs_id']; ?>"
                                            class="btn btn-xs btn-danger btn_delete4"
                                            style="background-color: #FFE600; border-color: #FFE600">x
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td></td>
                            <td id="PIN" contenteditable></td>
                            <td id="questions_result" contenteditable></td>
                            <td id="practical_test_question_id" contenteditable></td>
                            <td id="practical_test_answer" contenteditable></td>
                            <td id="practical_test_points" contenteditable></td>
                            <td>
                                <button type="button" name="btn_add" id="btn_add4" class="btn btn-xs btn-success"
                                        style="background-color: #0054a6; border-color: #0054a6">+
                                </button>
                            </td>
                        </tr>

                    </table>
                </div>
            </div>
        </div>


        <script>
            $(document).ready(function () {
                $(document).on('click', '#btn_add4', function () {
                    // get values of PIN, questions_result, practical_test_question_id, practical_test_answer and practical_test_points
                    var PIN = $('#PIN').text();
                    var questions_result = $('#questions_result').text();
                    var practical_test_question_id = $('#practical_test_question_id').text();
                    var practical_test_answer = $('#practical_test_answer').text();
                    var practical_test_points = $('#practical_test_points').text();
                    // if PIN is empty, make an alert
                    if (PIN == '') {
                        alert("Enter text");
                        return false;
                    }
                    // if questions_result is empty, make an alert
                    if (questions_result == '') {
                        alert("Enter text");
                        return false;
                    }
                    // if practical_test_question_id is empty, make an alert
                    if (practical_test_question_id == '') {
                        alert("Enter text");
                        return false;
                    }
                    // if practical_test_answer is empty, make an alert
                    if (practical_test_answer == '') {
                        alert("Enter text");
                        return false;
                    }
                    // if practical_test_points is empty, make an alert
                    if (practical_test_points == '') {
                        alert("Enter text");
                        return false;
                    }
                    // make $.ajax POST query
                    $.ajax({
                        url: "users/insertingRanking",
                        method: "POST",
                        data: {
                            PIN: PIN,
                            questions_result: questions_result,
                            practical_test_question_id: practical_test_question_id,
                            practical_test_answer: practical_test_answer,
                            practical_test_points: practical_test_points
                        },
                        dataType: "text",
                        success: function (data) {
                            alert(data);
                        }
                    })
                });
                // make $.ajax POST query
                function edit_data(id, text, column_name) {
                    $.ajax({
                        url: "users/editingRanking",
                        method: "POST",
                        data: {id: id, text: text, column_name: column_name},
                        dataType: "text",
                        success: function (data) {
                            alert(data);
                        }
                    });
                }
                $(document).on('blur', '.PIN', function () {
                    var id = $(this).data("id1");
                    var PIN = $(this).text();
                    edit_data(id, PIN, "PIN");
                });
                $(document).on('blur', '.questions_result', function () {
                    var id = $(this).data("id2");
                    var questions_result = $(this).text();
                    edit_data(id, questions_result, "questions_result");
                });
                $(document).on('blur', '.practical_test_question_id', function () {
                    var id = $(this).data("id3");
                    var practical_test_question_id = $(this).text();
                    edit_data(id, practical_test_question_id, "practical_test_question_id");
                });
                $(document).on('blur', '.practical_test_answer', function () {
                    var id = $(this).data("id4");
                    var practical_test_answer = $(this).text();
                    edit_data(id, practical_test_answer, "practical_test_answer");
                });
                $(document).on('blur', '.practical_test_points', function () {
                    var id = $(this).data("id5");
                    var practical_test_points = $(this).text();
                    edit_data(id, practical_test_points, "practical_test_points");
                });
                //make $.ajax POST query
                $(document).on('click', '.btn_delete4', function () {
                    var id = $(this).data("id6");
                    if (confirm("Are you sure you want to delete this?")) {
                        $.ajax({
                            url: "users/deletingRanking",
                            method: "POST",
                            data: {id: id},
                            dataType: "text",
                            success: function (data) {
                                alert(data);
                            }
                        });
                    }
                });
            });
        </script>


    </div>

<?php endif; ?>
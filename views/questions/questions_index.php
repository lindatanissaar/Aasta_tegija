<?php
$value = $_GET["pin"];
$_SESSION ['pin'] = $value;
//print_r($_SESSION);

$db_name = "aasta_tegija";
$table_name = "answers";
$table_name_2 = "questions";
$connection = @mysql_connect("localhost", "root", "") or die(mysql_error());
$db = @mysql_select_db($db_name, $connection) or die(mysql_error());


?>
<?php
//picks first 10 questions out of 30
$arr = array();

for ($i = 1; $i <= 30; $i++) {
    $arr[] = $i;
}
//shuffles the numbers
shuffle($arr);

$q0 = ($arr[0]);
$q1 = ($arr[1]);
$q2 = ($arr[2]);
$q3 = ($arr[3]);
$q4 = ($arr[4]);
$q5 = ($arr[5]);
$q6 = ($arr[6]);
$q7 = ($arr[7]);
$q8 = ($arr[8]);
$q9 = ($arr[9]);
?>

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
    <form action='process.php' method='post' id='quizForm' id='$number[1]'>
        <ol>
            <li>
                <h3><?php
                    $sql = "SELECT text FROM $table_name_2 WHERE question_id = '$q0'";
                    $result = @mysql_query($sql, $connection) or die(mysql_error());
                    while ($row = mysql_fetch_array($result)) {
                        $output = $row['text'];
                        echo htmlentities(utf8_encode($output));
                    }
                    ?>
                </h3>
                <div>
                    <input type='radio' name='answerOne' id='answerOne' value='A'/>
                    <label for='answerOneA'>A) <?php
                        $sql = "SELECT answer_text FROM $table_name WHERE question_id = '$q0' AND answer = '0' LIMIT 1";
                        $result = @mysql_query($sql, $connection) or die(mysql_error());
                        while ($row = mysql_fetch_array($result)) {
                            $output_1 = $row['answer_text'];
                            echo htmlentities(utf8_encode($output_1));
                        }
                        ?>
                    </label>
                </div>
                <div>
                    <input type='radio' name='answerOne' id='answerOne' value='B'/>
                    <label for='answerOneB'>B) <?php
                        $sql = "SELECT answer_text FROM $table_name WHERE question_id = '$q0'AND answer = '0' AND answer_text != '$output_1'";
                        $result = @mysql_query($sql, $connection) or die(mysql_error());
                        while ($row = mysql_fetch_array($result)) {
                            $output = $row['answer_text'];
                            echo htmlentities(utf8_encode($output));
                        }
                        ?></label>
                </div>
                <div>
                    <input type='radio' name='answerOne' id='answerOne' value='C'/>
                    <label for='answerOneC'>C) <?php
                        $sql = "SELECT answer_text FROM $table_name WHERE question_id = '$q0' AND answer = '1'";
                        $result = @mysql_query($sql, $connection) or die(mysql_error());
                        while ($row = mysql_fetch_array($result)) {
                            $output = $row['answer_text'];
                            echo htmlentities(utf8_encode($output));
                        }
                        ?></label>
                </div>
            </li>


            <li>
                <h3><?php
                    $sql = "SELECT text FROM $table_name_2 WHERE question_id = '$q1'";
                    $result = @mysql_query($sql, $connection) or die(mysql_error());
                    while ($row = mysql_fetch_array($result)) {
                        $output = $row['text'];
                        echo htmlentities(utf8_encode($output));
                    }
                    ?>
                </h3>
                <div>
                    <input type='radio' name='answerTwo' id='answerTwo' value='A'/>
                    <label for='answerTwoA'>A) <?php
                        $sql = "SELECT answer_text FROM $table_name WHERE question_id = '$q1' AND answer = '0' LIMIT 1";
                        $result = @mysql_query($sql, $connection) or die(mysql_error());
                        while ($row = mysql_fetch_array($result)) {
                            $output_1 = $row['answer_text'];
                            echo htmlentities(utf8_encode($output_1));
                        }
                        ?></label>
                </div>
                <div>
                    <input type='radio' name='answerTwo' id='answerTwo' value='B'/>
                    <label for='answerTwoB'>B) <?php
                        $sql = "SELECT answer_text FROM $table_name WHERE question_id = '$q1'AND answer = '0' AND answer_text != '$output_1'";
                        $result = @mysql_query($sql, $connection) or die(mysql_error());
                        while ($row = mysql_fetch_array($result)) {
                            $output = $row['answer_text'];
                            echo htmlentities(utf8_encode($output));
                        }
                        ?></label>
                </div>
                <div>
                    <input type='radio' name='answerTwo' id='answerTwo' value='C'/>
                    <label for='answerTwoC'>C) <?php
                        $sql = "SELECT answer_text FROM $table_name WHERE question_id = '$q1' AND answer = '1'";
                        $result = @mysql_query($sql, $connection) or die(mysql_error());
                        while ($row = mysql_fetch_array($result)) {
                            $output = $row['answer_text'];
                            echo htmlentities(utf8_encode($output));
                        }
                        ?></label>
                </div>
            </li>


            <li>
                <h3><?php
                    $sql = "SELECT text FROM $table_name_2 WHERE question_id = '$q2'";
                    $result = @mysql_query($sql, $connection) or die(mysql_error());
                    while ($row = mysql_fetch_array($result)) {
                        $output = $row["text"];
                        echo htmlentities(utf8_encode($output));
                    }
                    ?>
                </h3>
                <div>
                    <input type='radio' name='answerThree' id='answerThree' value='A'/>
                    <label for='answerThreeA'>A) <?php
                        $sql = "SELECT answer_text FROM $table_name WHERE question_id = '$q1' AND answer = '0' LIMIT 1";
                        $result = @mysql_query($sql, $connection) or die(mysql_error());
                        while ($row = mysql_fetch_array($result)) {
                            $output_1 = $row["answer_text"];
                            echo htmlentities(utf8_encode($output_1));
                        }
                        ?></label>
                </div>
                <div>
                    <input type='radio' name='answerThree' id='answerThree' value='B'/>
                    <label for='answerThreeB'>B) <?php
                        $sql = "SELECT answer_text FROM $table_name WHERE question_id = '$q2' AND answer = '1'";
                        $result = @mysql_query($sql, $connection) or die(mysql_error());
                        while ($row = mysql_fetch_array($result)) {
                            $output = $row["answer_text"];
                            echo htmlentities(utf8_encode($output));
                        }
                        ?></label>
                </div>
                <div>
                    <input type='radio' name='answerThree' id='answerThree' value='C'/>
                    <label for='answerThreeC'>C) <?php
                        $sql = "SELECT answer_text FROM $table_name WHERE question_id = '$q2'AND answer = '0' AND answer_text != '$output_1'";
                        $result = @mysql_query($sql, $connection) or die(mysql_error());
                        while ($row = mysql_fetch_array($result)) {
                            $output = $row["answer_text"];
                            echo htmlentities(utf8_encode($output));
                        }
                        ?></label>
                </div>
            </li>


            <li>
                <h3><?php
                    $sql = "SELECT text FROM $table_name_2 WHERE question_id = '$q3'";
                    $result = @mysql_query($sql, $connection) or die(mysql_error());
                    while ($row = mysql_fetch_array($result)) {
                        $output = $row["text"];
                        echo htmlentities(utf8_encode($output));
                    }
                    ?>
                </h3>
                <div>
                    <input type='radio' name='answerFour' id='answerFour' value='A'/>
                    <label for='answerFourA'>A) <?php
                        $sql = "SELECT answer_text FROM $table_name WHERE question_id = '$q3' AND answer = '1'";
                        $result = @mysql_query($sql, $connection) or die(mysql_error());
                        while ($row = mysql_fetch_array($result)) {
                            $output = $row["answer_text"];
                            echo htmlentities(utf8_encode($output));
                        }
                        ?></label>
                </div>
                <div>
                    <input type='radio' name='answerFour' id='answerFour' value='B'/>
                    <label for='answerFourB'>B) <?php
                        $sql = "SELECT answer_text FROM $table_name WHERE question_id = '$q3' AND answer = '0' LIMIT 1";
                        $result = @mysql_query($sql, $connection) or die(mysql_error());
                        while ($row = mysql_fetch_array($result)) {
                            $output_1 = $row["answer_text"];
                            echo htmlentities(utf8_encode($output_1));
                        }
                        ?></label>
                </div>
                <div>
                    <input type='radio' name='answerFour' id='answerFour' value='C'/>
                    <label for='answerFourC'>C) <?php
                        $sql = "SELECT answer_text FROM $table_name WHERE question_id = '$q3'AND answer = '0' AND answer_text != '$output_1'";
                        $result = @mysql_query($sql, $connection) or die(mysql_error());
                        while ($row = mysql_fetch_array($result)) {
                            $output = $row["answer_text"];
                            echo htmlentities(utf8_encode($output));
                        }
                        ?></label>
                </div>
            </li>


            <li>
                <h3><?php
                    $sql = "SELECT text FROM $table_name_2 WHERE question_id = '$q4'";
                    $result = @mysql_query($sql, $connection) or die(mysql_error());
                    while ($row = mysql_fetch_array($result)) {
                        $output = $row["text"];
                        echo htmlentities(utf8_encode($output));
                    }
                    ?>
                </h3>
                <div>
                    <input type='radio' name='answerFive' id='answerFive' value='A'/>
                    <label for='answerFiveA'>A) <?php
                        $sql = "SELECT answer_text FROM $table_name WHERE question_id = '$q4' AND answer = '0' LIMIT 1";
                        $result = @mysql_query($sql, $connection) or die(mysql_error());
                        while ($row = mysql_fetch_array($result)) {
                            $output_1 = $row["answer_text"];
                            echo htmlentities(utf8_encode($output_1));
                        }
                        ?></label>
                </div>
                <div>
                    <input type='radio' name='answerFive' id='answerFive' value='B'/>
                    <label for='answerFiveB'>B) <?php
                        $sql = "SELECT answer_text FROM $table_name WHERE question_id = '$q4'AND answer = '0' AND answer_text != '$output_1'";
                        $result = @mysql_query($sql, $connection) or die(mysql_error());
                        while ($row = mysql_fetch_array($result)) {
                            $output = $row["answer_text"];
                            echo htmlentities(utf8_encode($output));
                        }
                        ?></label>
                </div>
                <div>
                    <input type='radio' name='answerFive' id='answerFive' value='C'/>
                    <label for='answerFiveC'>C) <?php
                        $sql = "SELECT answer_text FROM $table_name WHERE question_id = '$q4' AND answer = '1'";
                        $result = @mysql_query($sql, $connection) or die(mysql_error());
                        while ($row = mysql_fetch_array($result)) {
                            $output = $row["answer_text"];
                            echo htmlentities(utf8_encode($output));
                        }
                        ?></label>
                </div>
            </li>


            <li>
                <h3><?php
                    $sql = "SELECT text FROM $table_name_2 WHERE question_id = '$q5'";
                    $result = @mysql_query($sql, $connection) or die(mysql_error());
                    while ($row = mysql_fetch_array($result)) {
                        $output = $row["text"];
                        echo htmlentities(utf8_encode($output));
                    }
                    ?>
                </h3>
                <div>
                    <input type='radio' name='answerSix' id='answerSix' value='A'/>
                    <label for='answerSixA'>A) <?php
                        $sql = "SELECT answer_text FROM $table_name WHERE question_id = '$q5' AND answer = '1'";
                        $result = @mysql_query($sql, $connection) or die(mysql_error());
                        while ($row = mysql_fetch_array($result)) {
                            $output = $row["answer_text"];
                            echo htmlentities(utf8_encode($output));
                        }
                        ?></label>
                </div>
                <div>
                    <input type='radio' name='answerSix' id='answerSix' value='B'/>
                    <label for='answerSixB'>B) <?php
                        $sql = "SELECT answer_text FROM $table_name WHERE question_id = '$q5' AND answer = '0' LIMIT 1";
                        $result = @mysql_query($sql, $connection) or die(mysql_error());
                        while ($row = mysql_fetch_array($result)) {
                            $output_1 = $row["answer_text"];
                            echo htmlentities(utf8_encode($output_1));
                        }
                        ?></label>
                </div>
                <div>
                    <input type='radio' name='answerSix' id='answerSix' value='C'/>
                    <label for='answerSixC'>C) <?php
                        $sql = "SELECT answer_text FROM $table_name WHERE question_id = '$q5'AND answer = '0' AND answer_text != '$output_1'";
                        $result = @mysql_query($sql, $connection) or die(mysql_error());
                        while ($row = mysql_fetch_array($result)) {
                            $output = $row["answer_text"];
                            echo htmlentities(utf8_encode($output));
                        }
                        ?></label>
                </div>
            </li>


            <li>
                <h3><?php
                    $sql = "SELECT text FROM $table_name_2 WHERE question_id = '$q6'";
                    $result = @mysql_query($sql, $connection) or die(mysql_error());
                    while ($row = mysql_fetch_array($result)) {
                        $output = $row["text"];
                        echo htmlentities(utf8_encode($output));
                    }
                    ?>
                </h3>
                <div>
                    <input type='radio' name='answerSeven' id='answerSeven' value='A'/>
                    <label for='answerEightA'>A) <?php
                        $sql = "SELECT answer_text FROM $table_name WHERE question_id = '$q6' AND answer = '0' LIMIT 1";
                        $result = @mysql_query($sql, $connection) or die(mysql_error());
                        while ($row = mysql_fetch_array($result)) {
                            $output_1 = $row["answer_text"];
                            echo htmlentities(utf8_encode($output_1));
                        }
                        ?></label>
                </div>
                <div>
                    <input type='radio' name='answerSeven' id='answerSeven' value='B'/>
                    <label for='answerSevenB'>B) <?php
                        $sql = "SELECT answer_text FROM $table_name WHERE question_id = '$q6' AND answer = '1'";
                        $result = @mysql_query($sql, $connection) or die(mysql_error());
                        while ($row = mysql_fetch_array($result)) {
                            $output = $row["answer_text"];
                            echo htmlentities(utf8_encode($output));
                        }
                        ?></label>
                </div>
                <div>
                    <input type='radio' name='answerSeven' id='answerSeven' value='C'/>
                    <label for='answerSevenC'>C) <?php
                        $sql = "SELECT answer_text FROM $table_name WHERE question_id = '$q6'AND answer = '0' AND answer_text != '$output_1'";
                        $result = @mysql_query($sql, $connection) or die(mysql_error());
                        while ($row = mysql_fetch_array($result)) {
                            $output = $row["answer_text"];
                            echo htmlentities(utf8_encode($output));
                        }
                        ?></label>
                </div>
            </li>


            <li>
                <h3><?php
                    $sql = "SELECT text FROM $table_name_2 WHERE question_id = '$q7'";
                    $result = @mysql_query($sql, $connection) or die(mysql_error());
                    while ($row = mysql_fetch_array($result)) {
                        $output = $row["text"];
                        echo htmlentities(utf8_encode($output));
                    }
                    ?>
                </h3>
                <div>
                    <input type='radio' name='answerEight' id='answerEight' value='A'/>
                    <label for='answerEightA'>A) <?php
                        $sql = "SELECT answer_text FROM $table_name WHERE question_id = '$q7' AND answer = '0' LIMIT 1";
                        $result = @mysql_query($sql, $connection) or die(mysql_error());
                        while ($row = mysql_fetch_array($result)) {
                            $output_1 = $row["answer_text"];
                            echo htmlentities(utf8_encode($output_1));
                        }
                        ?></label>
                </div>
                <div>
                    <input type='radio' name='answerEight' id='answerEight' value='B'/>
                    <label for='answerEightB'>B) <?php
                        $sql = "SELECT answer_text FROM $table_name WHERE question_id = '$q7'AND answer = '0' AND answer_text != '$output_1'";
                        $result = @mysql_query($sql, $connection) or die(mysql_error());
                        while ($row = mysql_fetch_array($result)) {
                            $output = $row["answer_text"];
                            echo htmlentities(utf8_encode($output));
                        }
                        ?></label>
                </div>
                <div>
                    <input type='radio' name='answerEight' id='answerEight' value='C'/>
                    <label for='answerEightC'>C) <?php
                        $sql = "SELECT answer_text FROM $table_name WHERE question_id = '$q7' AND answer = '1'";
                        $result = @mysql_query($sql, $connection) or die(mysql_error());
                        while ($row = mysql_fetch_array($result)) {
                            $output = $row["answer_text"];
                            echo htmlentities(utf8_encode($output));
                        }
                        ?></label>
                </div>
            </li>


            <li>
                <h3><?php
                    $sql = "SELECT text FROM $table_name_2 WHERE question_id = '$q8'";
                    $result = @mysql_query($sql, $connection) or die(mysql_error());
                    while ($row = mysql_fetch_array($result)) {
                        $output = $row["text"];
                        echo htmlentities(utf8_encode($output));
                    }
                    ?>
                </h3>
                <div>
                    <input type='radio' name='answerNine' id='answerNine' value='A'/>
                    <label for='answerNineA'>A) <?php
                        $sql = "SELECT answer_text FROM $table_name WHERE question_id = '$q8' AND answer = '0' LIMIT 1";
                        $result = @mysql_query($sql, $connection) or die(mysql_error());
                        while ($row = mysql_fetch_array($result)) {
                            $output_1 = $row["answer_text"];
                            echo htmlentities(utf8_encode($output_1));
                        }
                        ?></label>
                </div>
                <div>
                    <input type='radio' name='answerNine' id='answerNine' value='B'/>
                    <label for='answerNineB'>B) <?php
                        $sql = "SELECT answer_text FROM $table_name WHERE question_id = '$q8' AND answer = '1'";
                        $result = @mysql_query($sql, $connection) or die(mysql_error());
                        while ($row = mysql_fetch_array($result)) {
                            $output = $row["answer_text"];
                            echo htmlentities(utf8_encode($output));
                        }
                        ?></label>
                </div>
                <div>
                    <input type='radio' name='answerNine' id='answerNine' value='C'/>
                    <label for='answerNineC'>C) <?php
                        $sql = "SELECT answer_text FROM $table_name WHERE question_id = '$q8'AND answer = '0' AND answer_text != '$output_1'";
                        $result = @mysql_query($sql, $connection) or die(mysql_error());
                        while ($row = mysql_fetch_array($result)) {
                            $output = $row["answer_text"];
                            echo htmlentities(utf8_encode($output));
                        }
                        ?></label>
                </div>
            </li>


            <li>
                <h3><?php
                    $sql = "SELECT text FROM $table_name_2 WHERE question_id = '$q9'";
                    $result = @mysql_query($sql, $connection) or die(mysql_error());
                    while ($row = mysql_fetch_array($result)) {
                        $output = $row["text"];
                        echo htmlentities(utf8_encode($output));
                    }
                    ?>
                </h3>
                <div>
                    <input type='radio' name='answerTen' id='answerTen' value='A'/>
                    <label for='answerTenA'>A) <?php
                        $sql = "SELECT answer_text FROM $table_name WHERE question_id = '$q9' AND answer = '1'";
                        $result = @mysql_query($sql, $connection) or die(mysql_error());
                        while ($row = mysql_fetch_array($result)) {
                            $output = $row["answer_text"];
                            echo htmlentities(utf8_encode($output));
                        }
                        ?></label>
                </div>
                <div>
                    <input type='radio' name='answerTen' id='answerTen' value='B'/>
                    <label for='answerTenB'>B) <?php
                        $sql = "SELECT answer_text FROM $table_name WHERE question_id = '$q9' AND answer = '0' LIMIT 1";
                        $result = @mysql_query($sql, $connection) or die(mysql_error());
                        while ($row = mysql_fetch_array($result)) {
                            $output_1 = $row["answer_text"];
                            echo htmlentities(utf8_encode($output_1));
                        }
                        ?></label>
                </div>
                <div>
                    <input type='radio' name='answerTen' id='answerTen' value='C'/>
                    <label for='answerTenC'>C) <?php
                        $sql = "SELECT answer_text FROM $table_name WHERE question_id = '$q9'AND answer = '0' AND answer_text != '$output_1'";
                        $result = @mysql_query($sql, $connection) or die(mysql_error());
                        while ($row = mysql_fetch_array($result)) {
                            $output = $row["answer_text"];
                            echo htmlentities(utf8_encode($output));
                        }
                        ?></label>
                </div>
            </li>
        </ol>
    <input type="submit" id="btnSubmit" class="btn btn-primary btn-block" onClick="return validate()" value="Edasta!">
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

<?php  print_r($_SESSION) ?>


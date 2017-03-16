<html>
<head>
</head>
<?php
?>
<body bgcolor="#e1e1e1">

<div id="wrapper">

    <center><font face="Andalus" size="5">Punktid</font></center>
    <br/>
    <br/>

    <?php
    $answer1 = $_POST['answerOne'];
    $answer2 = $_POST['answerTwo'];
    $answer3 = $_POST['answerThree'];
    $answer4 = $_POST['answerFour'];
    $answer5 = $_POST['answerFive'];
    $answer6 = $_POST['answerSix'];
    $answer7 = $_POST['answerSeven'];
    $answer8 = $_POST['answerEight'];
    $answer9 = $_POST['answerNine'];
    $answer10 = $_POST['answerTen'];
    $score = 0;

    if ($answer1 == "C") {
        $score++;
    }
    if ($answer2 == "C") {
        $score++;
    }
    if ($answer3 == "B") {
        $score++;
    }
    if ($answer4 == "A") {
        $score++;
    }
    if ($answer5 == "C") {
        $score++;
    }
    if ($answer6 == "A") {
        $score++;
    }
    if ($answer7 == "B") {
        $score++;
    }
    if ($answer8 == "C") {
        $score++;
    }
    if ($answer9 == "B") {
        $score++;
    }
    if ($answer10 == "A") {
        $score++;
    }
    echo "<center><font face='Berlin Sans FB' size='8'>Punkti summa küsimustelt<br> $score/10</font></center>";
    $_SESSION['questions_result'] = $score;
  //  echo "<input type="button" id="btnSubmit"  value="Saada">";
?>
<p>Teid suunatakse kohe Praktilise testi juurde, ole kannatlik</p>
    <?php
        header( "refresh:0;url=practical_tests?questions_result=$score" );
    echo $score;
    ?>
</div>



</div>
</body>
</html>
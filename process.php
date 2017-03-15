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
    $answer1 = 0;
    if(isset($_POST['answerOne'])){
        $answer1 = $_POST['answerOne'];
    };
    $answer2 = 0;
    if(isset($_POST['answerTwo'])){
        $answer2 = $_POST['answerTwo'];
    };
    $answer3 = 0;
    if(isset($_POST['answerThree'])){
        $answer3 = $_POST['answerThree'];
    };
    $answer4 = 0;
    if(isset($_POST['answerFour'])){
        $answer4 = $_POST['answerFour'];
    };
    $answer5 = 0;
    if(isset($_POST['answerFive'])){
        $answer5 = $_POST['answerFive'];
    };
    $answer6 = 0;
    if(isset($_POST['answerSix'])){
        $answer6 = $_POST['answerSix'];
    };
    $answer7 = 0;
    if(isset($_POST['answerSeven'])){
        $answer7 = $_POST['answerSeven'];
    };
    $answer8 = 0;
    if(isset($_POST['answerEight'])){
        $answer8 = $_POST['answerEight'];
    };
    $answer9 = 0;
    if(isset($_POST['answerNine'])){
        $answer = $_POST['answerNine'];
    };
    $answer10 = 0;
    if(isset($_POST['answerTen'])){
        $answer10 = $_POST['answerTen'];
    };
    $score = 0;


    if ($answer1 === "C") {
        $score++;
    }
    if ($answer2 === "C") {
        $score++;
    }
    if ($answer3 === "B") {
        $score++;
    }
    if ($answer4 === "A") {
        $score++;
    }
    if ($answer5 === "C") {
        $score++;
    }
    if ($answer6 === "A") {
        $score++;
    }
    if ($answer7 === "B") {
        $score++;
    }
    if ($answer8 === "C") {
        $score++;
    }
    if ($answer9 === "B") {
        $score++;
    }
    if ($answer10 === "A") {
        $score++;
    }
    echo "<center><font face='Berlin Sans FB' size='8'>Punkti summa<br> $score/10</font></center>";

    ?>


</div>
</body>
</html>
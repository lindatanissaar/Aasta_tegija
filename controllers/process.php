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
    $answer1 = $_POST['answer[1]'];
    $answer2 = $_POST['answer[2]'];
    $answer3 = $_POST['answer[3]'];
    $answer4 = $_POST['answer[4]'];
    $answer5 = $_POST['answer[5]'];
    $answer6 = $_POST['answer[6]'];
    $answer7 = $_POST['answer[7]'];
    $answer8 = $_POST['answer[8]'];
    $answer9 = $_POST['answer[9]'];
    $answer10 = $_POST['answer[10]'];
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
        header( "refresh:5;url=practical_tests?questions_result=$score" );
    //echo $score;
    ?>
</div>



</div>
</body>
</html>
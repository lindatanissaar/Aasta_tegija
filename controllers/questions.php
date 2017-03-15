<?php namespace Halo;

class questions extends Controller
{
    public $requires_auth = false;
    public $template = 'forms';

    function index()
    {
        $this->answers = get_all("SELECT * FROM answers");

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

        if ($answer1 == $answers[answer]) {
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

    }




    function POST_index()
    {
        echo "\$_POST:<br>";
        var_dump($_POST);
    }

}
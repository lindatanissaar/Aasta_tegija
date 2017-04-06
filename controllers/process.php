<?php namespace Halo;

use \Aastategija\Questions;
use \Aastategija\Tests;
use \Aastategija\Users;

class process extends Controller
{
    public $requires_auth = false;

    function index()
    {
        $correct_answers = Questions::get_correct_answers();
        $score = Tests::get_score($_POST ['answers'], $correct_answers);
        Users::set_theoretical_score($_SESSION ['user_id'], $score);
        header('Location: ' . BASE_URL . 'practical_tests');
        exit();
    }
}




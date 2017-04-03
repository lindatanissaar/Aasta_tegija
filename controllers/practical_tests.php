<?php namespace Halo;

use Aastategija\Tests as T;
class practical_tests extends Controller
{
    public $requires_auth = false;
    public $template = 'forms';

    function index()
    {
        $this->practical_test = get_first("SELECT * FROM practical_test ORDER BY RAND() LIMIT 1");

    }


    /**
     *
     */
    function AJAX_practicalTestAnswer()
    {
            $user_id = $_SESSION["user_id"];
            $practical_test_answer = $_POST["practical_test_answer"];
            $practical_question_id = $_POST["practical_question_id"];
            T::sendAnswer($user_id, $practical_test_answer, $practical_question_id);
    }

}



<?php namespace Halo;

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
        $practical_test_answer = $_POST['practical_test_answer'];
        $user_id = $_POST['user_id'];
        $prtactical_test_id = $_POST['prtactical_test_id'];

        eioskateistmoodi("UPDATE logs SET practical_test_answer= '" . $practical_test_answer . "',
         practical_test_question_id= '" . $prtactical_test_id . "' WHERE user_id= '" . $user_id . "'");
        echo 'success';
    }

function POST_index()
{
    echo "\$_POST:<br>";
    var_dump($_POST);
}
}
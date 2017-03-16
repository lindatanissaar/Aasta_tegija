<?php namespace Halo;

class practical_tests_previews extends Controller
{
    public $requires_auth = false;
    public $template = 'forms';

    /**
     *
     */
    function index()
    {

        $value = $_GET['pin'];
        $_SESSION ['pin'] = $value;
        $this->practical_test_preview = get_first("SELECT * FROM logs WHERE PIN = '$value' LIMIT 1");
    }


    /**
     *
     */
    function AJAX_practicalTestEndSession()

    {
        if (isset($_POST["pin"])
            && isset($_POST["questions_result"])
            && isset($_POST["practical_test_answer"])
            && isset($_POST["practical_question_id"])
        ) {
            $pin = $_POST["pin"];
            $questions_result = $_POST["questions_result"];
            $practical_test_answer = $_POST["practical_test_answer"];
            $practical_question_id = $_POST["practical_question_id"];



            insert('logs', [
                'PIN' => $pin,
                'questions_result' => $questions_result,
                'practical_test_answer' => $practical_test_answer,
                'practical_test_question_id' => $practical_question_id,

            ]);
            echo "success";
        } else {
            echo "failed";
        }
    }

}

function POST_index()
{
    echo "\$_POST:<br>";
    var_dump($_POST);
}




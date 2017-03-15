<?php namespace Halo;

class practical_tests extends Controller
{
    public $requires_auth = false;
    public $template = 'forms';

    function index()
    {
        $this->practical_test = get_first("SELECT * FROM practical_test ORDER BY RAND() LIMIT 1");
        $_SESSION['pin']=38805244912;
        $_SESSION['questions_result']=10;
    }


    /**
     *
     */
    function AJAX_practicalTestAnswer()

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


            $conn = mysqli_connect("127.0.0.1", "root", "", "aastategija");
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




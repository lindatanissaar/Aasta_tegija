<?php namespace Halo;
/**
 * Created by PhpStorm.
 * User: Maile
 * Date: 17.09.14
 * Time: 18:19
 */
use Aastategija\Users as Users_Model;
class users extends Controller
{
    public $requires_auth = true;
    public $template = 'users';

    function AJAX_addEnterant()
    {
        // controls whether pin, firstName, and lastName are set
        if (isset($_POST["pin"]) && isset($_POST["firstName"]) && isset($_POST["lastName"])) {
            // uses Users class
            Users_Model::enterantsAdd($_POST["pin"], $_POST["firstName"], $_POST["lastName"]);
            echo "success";
        }
    }

    function AJAX_addAdmin()
    {
        // controls whether email and password are set
        if (isset($_POST["email"]) && isset($_POST["password"])) {

            // uses Users class
            Users_Model::adminsAdd($_POST["email"], $_POST["password"]);
            echo "success";
        }
    }


    function AJAX_selectQuestions()
    {
        // makes query to database to get questions
        $this->questions = get_all("SELECT * FROM questions ORDER BY question_id DESC");

    }

    function AJAX_insertQuestion()
    {
        // makes query to database to insert questions
        q("INSERT INTO questions(text) VALUES('" . $_POST["text"] . "')");
        echo 'Data Inserted';
    }

    function AJAX_editQuestion()
    {

        $id = $_POST["id"];
        $text = $_POST["text"];
        $column_name = $_POST["column_name"];

        // makes query to database to update questions
        q("UPDATE questions SET " . $column_name . "='" . $text . "' WHERE question_id='" . $id . "'");
        echo 'Data Updated';
    }

    function AJAX_deleteQuestion()
    {
        // makes query to database to delete questions
        q("DELETE FROM questions WHERE question_id = '" . $_POST["id"] . "'");
        echo 'Data Deleted';
    }



    function AJAX_selectAnswers()
    {
        // makes query to database to get answers
        $this->answers = get_all("SELECT * FROM answers ORDER BY answer_id DESC");

    }



    function AJAX_insertAnswer()
    {
        // makes query to database to insert answers
        q("INSERT INTO answers(question_id, answer_text, answer) VALUES('" . $_POST["question_id"] . "', '" . $_POST["answer_text"] . "', '" . $_POST["answer"] . "')");
        echo 'Data Inserted';
    }


    function AJAX_editAnswer()
    {

        $id = $_POST["id"];
        $text = $_POST["text"];
        $column_name = $_POST["column_name"];

        // makes query to database to update answers
        q("UPDATE answers SET " . $column_name . "='" . $text . "' WHERE answer_id='" . $id . "'");
        echo 'Data Updated';
    }


    function AJAX_deleteAnswer()
    {
        // makes query to database to delete answers
        q("DELETE FROM answers WHERE answer_id = '" . $_POST["id"] . "'");
        echo 'Data Deleted';
    }


    function AJAX_selectPractical()
    {
        // makes query to database to get practical questions
        $this->practicals = get_all("SELECT * FROM practical_test ORDER BY practical_id DESC");
    }


    function AJAX_insertPractical()
    {
        // makes query to database to insert practical questions
        q("INSERT INTO practical_test(practical_text) VALUES('" . $_POST["practical_text"] . "')");
        echo 'Data Inserted';
    }


    function AJAX_editPractical()
    {

        $id = $_POST["id"];
        $text = $_POST["text"];
        $column_name = $_POST["column_name"];

        // makes query to database to update practical questions
        q("UPDATE practical_test SET " . $column_name . "='" . $text . "' WHERE practical_id='" . $id . "'");
        echo 'Data Updated';
    }


    function AJAX_deletePractical()
    {
        // makes query to database to delete practical questions
        q("DELETE FROM practical_test WHERE practical_id = '" . $_POST["id"] . "'");
        echo 'Data Deleted';
    }


    function AJAX_selectRanking()
    {
        // makes query to database to get logs table
        $this->logs = get_all("SELECT * FROM logs ORDER BY logs_id DESC");
    }


    function AJAX_insertRanking()
    {
        // makes query to database to insert values into logs table
        q("INSERT INTO logs(PIN, questions_result, practical_test_question_id, practical_test_answer, practical_test_points) VALUES('" . $_POST["PIN"] . "', '" . $_POST["questions_result"] . "','" . $_POST["practical_test_question_id"] . "','" . $_POST["practical_test_answer"] . "', '" . $_POST["practical_test_points"] . "')");
        echo 'Data Inserted';
    }


    function AJAX_editRanking()
    {
        // makes query to database to edit logs table
        $id = $_POST["id"];
        $text = $_POST["text"];
        $column_name = $_POST["column_name"];
        q("UPDATE logs SET " . $column_name . "='" . $text . "' WHERE logs_id='" . $id . "'");
        echo 'Data Updated';
    }


    function AJAX_deleteRanking()
    {
        // makes query to database to delete data from logs table
        q("DELETE FROM logs WHERE logs_id = '" . $_POST["id"] . "'");
        echo 'Data Deleted';
    }


    function index()
    {
        // gets all questions from database
        $this->questions = get_all("SELECT * FROM questions ORDER BY question_id DESC");

        // gets all answers from database
        $this->answers = get_all("SELECT * FROM answers ORDER BY answer_id DESC");

        // gets all practical questions from database
        $this->practicals = get_all("SELECT * FROM practical_test ORDER BY practical_id DESC");

        // gets all log table from database
        $this->logs = get_all("SELECT * FROM logs ORDER BY logs_id DESC");
    }
} 
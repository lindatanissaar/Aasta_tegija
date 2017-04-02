<?php namespace Halo;
/**
 * Created by PhpStorm.
 * User: Maile
 * Date: 17.09.14
 * Time: 18:19
 */
use Aastategija\Login as Adding_Model;
class users extends Controller
{
    public $requires_auth = true;
    public $template = 'users';

    // function for adding entrants
    function AJAX_addingEnterants()
    {
        if (isset($_POST["pin"]) && isset($_POST["firstName"]) && isset($_POST["lastName"])) {
            $pin = $_POST["pin"];
            $firstName = $_POST["firstName"];
            $lastName = $_POST["lastName"];

            Adding_Model::enterantsAdd($pin, $firstName, $lastName);
            echo "success";
        }
    }

    // function for adding admins
    function AJAX_addingAdmins()
    {
        if (isset($_POST["email"]) && isset($_POST["password"])) {
            $email = $_POST["email"];
            $password = $_POST["password"];

            Adding_Model::adminsAdd($email, $password);
            echo "success";
        }
    }


    // function for selecting questions
    function AJAX_selectingQuestions()
    {
        $this->questions = get_all("SELECT * FROM questions ORDER BY question_id DESC");

    }

    // function for inserting questions to database
    function AJAX_insertingQuestions()
    {

        q("INSERT INTO questions(text) VALUES('" . $_POST["text"] . "')");
        echo 'Data Inserted';
    }

    // function for editing questions in database
    function AJAX_editingQuestions()
    {

        $id = $_POST["id"];
        $text = $_POST["text"];
        $column_name = $_POST["column_name"];
        q("UPDATE questions SET " . $column_name . "='" . $text . "' WHERE question_id='" . $id . "'");
        echo 'Data Updated';
    }

    // function for deleting questions to database
    function AJAX_deletingQuestions()
    {

        q("DELETE FROM questions WHERE question_id = '" . $_POST["id"] . "'");
        echo 'Data Deleted';
    }


    // function for selecting answers
    function AJAX_selectingAnswers()
    {
        $this->answers = get_all("SELECT * FROM answers ORDER BY answer_id DESC");

    }


    // function for inserting answers to database
    function AJAX_insertingAnswers()
    {
        q("INSERT INTO answers(question_id, answer_text, answer) VALUES('" . $_POST["question_id"] . "', '" . $_POST["answer_text"] . "', '" . $_POST["answer"] . "')");
        echo 'Data Inserted';
    }


    // function for editing answers in database
    function AJAX_editingAnswers()
    {

        $id = $_POST["id"];
        $text = $_POST["text"];
        $column_name = $_POST["column_name"];
        q("UPDATE answers SET " . $column_name . "='" . $text . "' WHERE answer_id='" . $id . "'");
        echo 'Data Updated';
    }


    // function for deleting answers in database
    function AJAX_deletingAnswers()
    {

        q("DELETE FROM answers WHERE answer_id = '" . $_POST["id"] . "'");
        echo 'Data Deleted';
    }


    // function for selecting practical test
    function AJAX_selectingPractical()
    {
        $this->practicals = get_all("SELECT * FROM practical_test ORDER BY practical_id DESC");
    }


    // function for inserting practical test questions to database
    function AJAX_insertingPractical()
    {

        q("INSERT INTO practical_test(practical_text) VALUES('" . $_POST["practical_text"] . "')");
        echo 'Data Inserted';
    }


    // function for editing practical test questions in database
    function AJAX_editingPractical()
    {

        $id = $_POST["id"];
        $text = $_POST["text"];
        $column_name = $_POST["column_name"];
        q("UPDATE practical_test SET " . $column_name . "='" . $text . "' WHERE practical_id='" . $id . "'");
        echo 'Data Updated';
    }


    // function for deleting practical test questions in database
    function AJAX_deletingPractical()
    {

        q("DELETE FROM practical_test WHERE practical_id = '" . $_POST["id"] . "'");
        echo 'Data Deleted';
    }


    // function for selecting results from database
    function AJAX_selectingRanking()
    {
        $this->logs = get_all("SELECT * FROM logs ORDER BY logs_id DESC");
    }


    // function for grading results
    function AJAX_insertingRanking()
    {

        q("INSERT INTO logs(PIN, questions_result, practical_test_question_id, practical_test_answer, practical_test_points) VALUES('" . $_POST["PIN"] . "', '" . $_POST["questions_result"] . "','" . $_POST["practical_test_question_id"] . "','" . $_POST["practical_test_answer"] . "', '" . $_POST["practical_test_points"] . "')");
        echo 'Data Inserted';
    }


    // function for editing results
    function AJAX_editingRanking()
    {

        $id = $_POST["id"];
        $text = $_POST["text"];
        $column_name = $_POST["column_name"];
        q("UPDATE logs SET " . $column_name . "='" . $text . "' WHERE logs_id='" . $id . "'");
        echo 'Data Updated';
    }


    // function for deleting results in database
    function AJAX_deletingRanking()
    {

        q("DELETE FROM logs WHERE logs_id = '" . $_POST["id"] . "'");
        echo 'Data Deleted';
    }


    // making queries from database
    function index()
    {
        $this->questions = get_all("SELECT * FROM questions ORDER BY question_id DESC");
        $this->answers = get_all("SELECT * FROM answers ORDER BY answer_id DESC");
        $this->practicals = get_all("SELECT * FROM practical_test ORDER BY practical_id DESC");
        $this->logs = get_all("SELECT * FROM logs ORDER BY logs_id DESC");
    }
} 
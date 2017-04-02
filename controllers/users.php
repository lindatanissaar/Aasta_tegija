<?php namespace Halo;
/**
 * Created by PhpStorm.
 * User: Maile
 * Date: 17.09.14
 * Time: 18:19
 */
class users extends Controller
{
    public $requires_auth = true;
    public $template = 'users';
    function AJAX_addingEnterants()
    {
        if (isset($_POST["pin"]) && isset($_POST["firstName"]) && isset($_POST["lastName"])) {
            $pin = $_POST["pin"];
            $firstName = $_POST["firstName"];
            $lastName = $_POST["lastName"];

            insert('users',[
                'firstName'=>$firstName,
                'lastName'=>$lastName,
                'pin'=>$pin
            ]);
            echo "success";
        }
    }
    function AJAX_addingAdmins()
    {
        if (isset($_POST["email"]) && isset($_POST["password"])) {
            $email = $_POST["email"];
            $password = $_POST["password"];
            // Hash the password
            $password = password_hash($password, PASSWORD_DEFAULT);

            insert('users',[
                'email'=>$email,
                'password'=>$password,
                'is_admin'=>1
            ]);
            echo "success";
        }
    }
    function AJAX_selectingQuestions()
    {

        $output = '';
        $mysql = "SELECT * FROM questions ORDER BY question_id DESC";
        $result = mysqli_query($conn, $mysql);
        $output .= '  
              <div class="table-responsive">  
                   <table class="table table-bordered" width="80%">  
                        <tr>  
                             <th width="15%">Id</th>  
                             <th width="70%">Tekst</th>  
                             <th width="15%">Kustuta/Lisa</th>  
                        </tr>';
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $output .= '  
                        <tr>  
                             <td>' . $row["question_id"] . '</td>  
                             <td class="text" data-id1="' . $row["question_id"] . '" contenteditable>' . $row["text"] . '</td>  
                             <td><button type="button" name="delete_btn" data-id3="' . $row["question_id"] . '" class="btn btn-xs btn-danger btn_delete2" style="background-color: #FFE600; border-color: #FFE600">x</button></td>  
                        </tr>  
                   ';
            }
            $output .= '  
                   <tr>  
                        <td></td>  
                        <td id="text" contenteditable></td> 
                        <td><button type="button" name="btn_add" id="btn_add2" class="btn btn-xs btn-success" style="background-color: #0054a6; border-color: #0054a6" >+</button></td>  
                   </tr>  
              ';
        } else {
            $output .= '<tr>  
                                  <td colspan="4">Andmed puuduvad</td>  
                             </tr>';
        }
        $output .= '</table>  
              </div>';
        echo $output;
    }
    function AJAX_insertingQuestions(){

        q("INSERT INTO questions(text) VALUES('".$_POST["text"]."')");
                    echo 'Data Inserted';
    }
    function AJAX_editingQuestions(){

        $id = $_POST["id"];
        $text = $_POST["text"];
        $column_name = $_POST["column_name"];
        q("UPDATE questions SET ".$column_name."='".$text."' WHERE question_id='".$id."'");
                    echo 'Data Updated';
    }
    function AJAX_deletingQuestions(){

        q("DELETE FROM questions WHERE question_id = '".$_POST["id"]."'");
                    echo 'Data Deleted';
    }
    // answers
    function AJAX_selectingAnswers()
    {

        $output = '';
        $mysql = "SELECT * FROM answers ORDER BY answer_id DESC";
        $result = mysqli_query($conn, $mysql);
        $output .= '  
              <div class="table-responsive">  
                   <table class="table table-bordered" width="80%">  
                        <tr>  
                             <th width="20%">Id</th>  
                             <th width="20%">Küsimuse_id</th>  
                             <th width="20%">Tekst</th>
                             <th width="20%">Õige/väär</th>
                             <th width="20%">Kustuta/Lisa</th>  
                        </tr>';
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $output .= '  
                        <tr>  
                             <td>' . $row["answer_id"] . '</td>  
                             <td class="question_id" data-id1="' . $row["answer_id"] . '" contenteditable>' . $row["question_id"] . '</td> 
                             <td class="answer_text" data-id2="' . $row["answer_id"] . '" contenteditable>' . $row["answer_text"] . '</td>
                             <td class="answer" data-id3="' . $row["answer_id"] . '" contenteditable>' . $row["answer"] . '</td>
                             <td><button type="button" name="delete_btn" data-id4="' . $row["answer_id"] . '" class="btn btn-xs btn-danger btn_delete3" style="background-color: #FFE600; border-color: #FFE600">x</button></td>  
                        </tr>  
                   ';
            }
            $output .= '  
                   <tr>  
                        <td></td>
                        <td id="question_id" contenteditable></td>
                        <td id="answer_text" contenteditable></td>
                        <td id="answer" contenteditable></td> 
                        <td><button type="button" name="btn_add" id="btn_add3" class="btn btn-xs btn-success" style="background-color: #0054a6; border-color: #0054a6" >+</button></td>  
                   </tr>  
              ';
        } else {
            $output .= '<tr>  
                                  <td colspan="4">Andmed puuduvad</td>  
                             </tr>';
        }
        $output .= '</table>  
              </div>';
        echo $output;
    }
    function AJAX_insertingAnswers(){

        $mysql = "INSERT INTO answers(question_id, answer_text, answer) VALUES('".$_POST["question_id"]."', '".$_POST["answer_text"]."', '".$_POST["answer"]."')";
                    echo 'Data Inserted';
    }
    function AJAX_editingAnswers(){

        $id = $_POST["id"];
        $text = $_POST["text"];
        $column_name = $_POST["column_name"];
        $mysql = "UPDATE answers SET ".$column_name."='".$text."' WHERE answer_id='".$id."'";
                    echo 'Data Updated';
    }
    function AJAX_deletingAnswers(){

        q("DELETE FROM answers WHERE answer_id = '".$_POST["id"]."'");
                    echo 'Data Deleted';
    }
    // practical
    function AJAX_selectingPractical()
    {

        $output = '';
        $mysql = "SELECT * FROM practical_test ORDER BY practical_id DESC";
        $result = mysqli_query($conn, $mysql);
        $output .= '  
              <div class="table-responsive">  
                   <table class="table table-bordered" width="80%">  
                        <tr>  
                             <th width="15%">Id</th>  
                             <th width="70%">Tekst</th>  
                             <th width="15%">Kustuta/Lisa</th>  
                        </tr>';
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $output .= '  
                        <tr>  
                             <td>' . $row["practical_id"] . '</td>  
                             <td class="practical_text" data-id1="' . $row["practical_id"] . '" contenteditable>' . $row["practical_text"] . '</td>  
                             <td><button type="button" name="delete_btn" data-id3="' . $row["practical_id"] . '" class="btn btn-xs btn-danger btn_delete" style="background-color: #FFE600; border-color: #FFE600">x</button></td>  
                        </tr>  
                   ';
            }
            $output .= '  
                   <tr>  
                        <td></td>  
                        <td id="practical_text" contenteditable></td> 
                        <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success" style="background-color: #0054a6; border-color: #0054a6" >+</button></td>  
                   </tr>  
              ';
        } else {
            $output .= '<tr>  
                                  <td colspan="4">Andmed puuduvad</td>  
                             </tr>';
        }
        $output .= '</table>  
              </div>';
        echo $output;
    }
    function AJAX_insertingPractical(){

        $mysql = "INSERT INTO practical_test(practical_text) VALUES('".$_POST["practical_text"]."')";
                    echo 'Data Inserted';
    }
    function AJAX_editingPractical(){

        $id = $_POST["id"];
        $text = $_POST["text"];
        $column_name = $_POST["column_name"];
        $mysql = "UPDATE practical_test SET ".$column_name."='".$text."' WHERE practical_id='".$id."'";
                    echo 'Data Updated';
    }
    function AJAX_deletingPractical(){

        q("DELETE FROM practical_test WHERE practical_id = '".$_POST["id"]."'");
                    echo 'Data Deleted';
    }
    // ranking
    function AJAX_selectingRanking()
    {

        $output = '';
        $mysql = "SELECT * FROM logs ORDER BY logs_id DESC";
        $result = mysqli_query($conn, $mysql);
        $output .= '  
              <div class="table-responsive">  
                   <table class="table table-bordered" width="80%">  
                        <tr>  
                             <th width="10%">LogiId</th>  
                             <th width="10%">PIN</th>  
                             <th width="20%">Teoreetiline tulemus</th>
                             <th width="20%">Praktiline ülesanne</th>
                             <th width="20%">Praktiline vastus</th>
                             <th width="10%">Praktiline tulemus</th>
                             <th width="10%">Kustuta/Lisa</th>  
                        </tr>';
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $output .= '  
                        <tr>  
                             <td>' . $row["logs_id"] . '</td>  
                             <td class="PIN" data-id1="' . $row["logs_id"] . '" contenteditable>' . $row["PIN"] . '</td> 
                             <td class="questions_result" data-id2="' . $row["logs_id"] . '" contenteditable>' . $row["questions_result"] . '</td>
                             <td class="practical_test_question_id" data-id3="' . $row["logs_id"] . '" contenteditable>' . $row["practical_test_question_id"] . '</td>
                             <td class="practical_test_answer" data-id4="' . $row["logs_id"] . '" contenteditable>' . $row["practical_test_answer"] . '</td>
                             <td class="practical_test_points" data-id5="' . $row["logs_id"] . '" contenteditable>' . $row["practical_test_points"] . '</td>
                             <td><button type="button" name="delete_btn" data-id6="' . $row["logs_id"] . '" class="btn btn-xs btn-danger btn_delete4" style="background-color: #FFE600; border-color: #FFE600">x</button></td>  
                        </tr>  
                   ';
            }
            $output .= '  
                   <tr>  
                        <td></td>
                        <td id="PIN" contenteditable></td>
                        <td id="questions_result" contenteditable></td>
                        <td id="practical_test_question_id" contenteditable></td>
                        <td id="practical_test_answer" contenteditable></td>
                        <td id="practical_test_points" contenteditable></td> 
                        <td><button type="button" name="btn_add" id="btn_add4" class="btn btn-xs btn-success" style="background-color: #0054a6; border-color: #0054a6" >+</button></td>  
                   </tr>  
              ';
        } else {
            $output .= '<tr>  
                                  <td colspan="4">Andmed puuduvad</td>  
                             </tr>';
        }
        $output .= '</table>  
              </div>';
        echo $output;
    }
    function AJAX_insertingRanking(){

        $mysql = "INSERT INTO logs(PIN, questions_result, practical_test_question_id, practical_test_answer, practical_test_points) VALUES('".$_POST["PIN"]."', '".$_POST["questions_result"]."','".$_POST["practical_test_question_id"]."','".$_POST["practical_test_answer"]."', '".$_POST["practical_test_points"]."')";
                    echo 'Data Inserted';
    }
    function AJAX_editingRanking(){

        $id = $_POST["id"];
        $text = $_POST["text"];
        $column_name = $_POST["column_name"];
        $mysql = "UPDATE logs SET ".$column_name."='".$text."' WHERE logs_id='".$id."'";
                    echo 'Data Updated';
    }
    function AJAX_deletingRanking(){

        q("DELETE FROM answers WHERE answer_id = '".$_POST["id"]."'");
                    echo 'Data Deleted';
    }
    function index()
    {
        $this->users = get_all("SELECT * FROM users WHERE deleted=0");
    }
    function view()
    {
        $user_id = $this->params[0];
        if (empty($user_id))
            error_out('Check user ID in address bar');
        $this->user = get_first("SELECT * FROM users WHERE user_id = '$user_id'");
    }
    function post_edit()
    {
        $data = $_POST['data'];
        $data['user_id'] = $this->params[0];
        insert('users', $data);
        header('Location: ' . BASE_URL . 'users/view/' . $this->params[0]);
    }
} 
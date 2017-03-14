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

            $conn = mysqli_connect("127.0.0.1", "root", "", "Aasta_tegija");
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

            $conn = mysqli_connect("127.0.0.1", "root", "", "Aasta_tegija");
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
        $conn = mysqli_connect("127.0.0.1", "root", "", "Aasta_tegija");
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
        $conn = mysqli_connect("127.0.0.1", "root", "", "Aasta_tegija");
        $mysql = "INSERT INTO questions(text) VALUES('".$_POST["text"]."')";
        if(mysqli_query($conn, $mysql))
        {
            echo 'Data Inserted';
        }
    }

    function AJAX_editingQuestions(){
        $conn = mysqli_connect("127.0.0.1", "root", "", "Aasta_tegija");
        $id = $_POST["id"];
        $text = $_POST["text"];
        $column_name = $_POST["column_name"];
        $mysql = "UPDATE questions SET ".$column_name."='".$text."' WHERE question_id='".$id."'";
        if(mysqli_query($conn, $mysql))
        {
            echo 'Data Updated';
        }
    }

    function AJAX_deletingQuestions(){
        $conn = mysqli_connect("127.0.0.1", "root", "", "Aasta_tegija");
        $mysql = "DELETE FROM questions WHERE question_id = '".$_POST["id"]."'";
        if(mysqli_query($conn, $mysql))
        {
            echo 'Data Deleted';
        }
    }

    // answers

    function AJAX_selectingAnswers()
    {
        $conn = mysqli_connect("127.0.0.1", "root", "", "Aasta_tegija");
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
        $conn = mysqli_connect("127.0.0.1", "root", "", "Aasta_tegija");
        $mysql = "INSERT INTO answers(question_id, answer_text, answer) VALUES('".$_POST["question_id"]."', '".$_POST["answer_text"]."', '".$_POST["answer"]."')";
        if(mysqli_query($conn, $mysql))
        {
            echo 'Data Inserted';
        }
    }

    function AJAX_editingAnswers(){
        $conn = mysqli_connect("127.0.0.1", "root", "", "Aasta_tegija");
        $id = $_POST["id"];
        $text = $_POST["text"];
        $column_name = $_POST["column_name"];
        $mysql = "UPDATE answers SET ".$column_name."='".$text."' WHERE answer_id='".$id."'";
        if(mysqli_query($conn, $mysql))
        {
            echo 'Data Updated';
        }
    }

    function AJAX_deletingAnswers(){
        $conn = mysqli_connect("127.0.0.1", "root", "", "Aasta_tegija");
        $mysql = "DELETE FROM answers WHERE answer_id = '".$_POST["id"]."'";
        if(mysqli_query($conn, $mysql))
        {
            echo 'Data Deleted';
        }
    }


    // practical
    function AJAX_selectingPractical()
    {
        $conn = mysqli_connect("127.0.0.1", "root", "", "Aasta_tegija");
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
        $conn = mysqli_connect("127.0.0.1", "root", "", "Aasta_tegija");
        $mysql = "INSERT INTO practical_test(practical_text) VALUES('".$_POST["practical_text"]."')";
        if(mysqli_query($conn, $mysql))
        {
            echo 'Data Inserted';
        }
    }

    function AJAX_editingPractical(){
        $conn = mysqli_connect("127.0.0.1", "root", "", "Aasta_tegija");
        $id = $_POST["id"];
        $text = $_POST["text"];
        $column_name = $_POST["column_name"];
        $mysql = "UPDATE practical_test SET ".$column_name."='".$text."' WHERE practical_id='".$id."'";
        if(mysqli_query($conn, $mysql))
        {
            echo 'Data Updated';
        }
    }

    function AJAX_deletingPractical(){
        $conn = mysqli_connect("127.0.0.1", "root", "", "Aasta_tegija");
        $mysql = "DELETE FROM practical_test WHERE practical_id = '".$_POST["id"]."'";
        if(mysqli_query($conn, $mysql))
        {
            echo 'Data Deleted';
        }
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
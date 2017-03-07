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
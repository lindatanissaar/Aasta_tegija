<?php namespace Halo;

class welcome extends Controller
{
    public $requires_auth = false;
    public $template = 'forms';

    function index()
    {
        $this->users = get_all("SELECT * FROM users");
    }


    function AJAX_enterantsLogin()
    {
        if (isset($_POST["pin"])) {
            $pin = $_POST["pin"];
            $conn = mysqli_connect("127.0.0.1", "root", "", "aastategija");
            $data = mysqli_query($conn, "SELECT * FROM `users` WHERE `pin` = '{$pin}'");
            $row_cnt = mysqli_num_rows($data);
            if ($row_cnt == 1) {
                echo "success";
            }else{
                echo "failed";
            }
        }
    }

    function POST_index()
    {
        echo "\$_POST:<br>";
        var_dump($_POST);
    }

}
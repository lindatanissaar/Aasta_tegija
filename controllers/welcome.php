<?php namespace Halo;

use \Aastategija\Tests;

class welcome extends Controller
{
    public $requires_auth = false;
    public $template = 'forms';

    function index()
    {
        $this->users = get_all("SELECT * FROM users");
    }


    function view()
    {
        $form_id = $this->params[0];
        $this->form = get_first("SELECT * FROM forms WHERE form_id = '{$form_id}'");
    }


    function edit()
    {
        $form_id = $this->params[0];
        $this->form = get_first("SELECT * FROM forms WHERE form_id = '{$form_id}'");
    }


    function post_edit()
    {
        $data = $_POST['data'];
        insert('form', $data);
    }


    function ajax_delete()
    {
        exit(q("DELETE FROM forms WHERE form_id = '{$_POST['form_id']}'") ? 'Ok' : 'Fail');
    }


    function AJAX_enterantsLogin()
    {

        if (isset($_POST["pin"])) {
            $pin = $_POST["pin"];

            $users = get_first("SELECT user_id FROM users WHERE pin = '{$pin}'");
            if (!empty($users['user_id'])) {

                $_SESSION['user_id'] = $users['user_id'];
            }

            exit (empty($users['user_id']) ? 'puudub' : 'success');
        }
    }

    function POST_index()
    {
        echo "\$_POST:<br>";
        var_dump($_POST);
    }

}
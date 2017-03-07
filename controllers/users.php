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
    public $template = 'forms';

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
<?php namespace Halo;

use \Aastategija\Tests;

class forms extends Controller
{
    public $requires_auth = false;
    public $template = 'forms';

    function index()
    {
        $foo = Tests::add();
        $this->forms = get_all("SELECT * FROM forms");
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

}
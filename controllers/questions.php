<?php namespace Halo;

class questions extends Controller
{
    public $requires_auth = false;
    public $template = 'forms';

    function index()
    {

    }




    function POST_index()
    {
        echo "\$_POST:<br>";
        var_dump($_POST);
    }

}
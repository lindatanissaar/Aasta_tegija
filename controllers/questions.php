<?php namespace Halo;
use \Aastategija\Questions as Q;
class questions extends Controller
{
    public $requires_auth = false;
    public $template = 'forms';
    function index()
    {
        $this->questions = Q::get();
    }
    function success()
    {
        echo "success";
    }
}
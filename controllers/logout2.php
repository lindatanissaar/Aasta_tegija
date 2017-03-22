<?php namespace Halo;

/**
 * Created by PhpStorm.
 * User: hennotaht
 * Date: 7/29/13
 * Time: 21:48
 */
class logout2 extends Controller
{
    public $requires_auth = false;

    function index()
    {
        session_destroy();
        header('Location: welcome');
        exit();
    }

}
<?php namespace Halo;

class practical_tests_previews extends Controller
{
    public $requires_auth = false;
    public $template = 'forms';

    /**
     *
     */
    function index()
    {
        $user_id = $_SESSION['user_id'];
        $this->practical_test_preview = get_first("SELECT practical_test_answer FROM logs WHERE user_id = '" . $user_id . "' LIMIT 1");
    }


    /**
     *
     */

    function POST_index()
    {
        echo "\$_POST:<br>";
        var_dump($_POST);
    }
}




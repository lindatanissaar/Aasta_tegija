<?php namespace Halo;

use Aastategija\Tests as T;
class practical_tests_previews extends Controller
{
    public $requires_auth = false;
    public $template = 'forms';

    function index()
    {
        $this->practical_test_preview = get_first("SELECT * FROM logs WHERE user_id = $_SESSION[user_id] LIMIT 1");
    }

}





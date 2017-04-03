<?php namespace Halo;

class process extends Controller
{
    public $requires_auth = false;

    static function process()
    {
        for($x = 0; $x <= 10; $x++){
            $theor_ans = $_POST['answer[1]'];
            $check = get_all("SELECT * FROM answers WHERE answer_id = $x AND answer = 1");
        }
        if($theor_ans[$x] = $check){

        }




        $answer1 = $_POST['answer[1]'];

        $score = 0;
        var
        foreach ($answers as $answer) {
            foreach ($answer as $value) {
                $check = get_first("SELECT * FROM answers WHERE answer_id = $value");
                if ($check['answer'] == 1) {
                    $score++;
                }
            }
        }
    }
}



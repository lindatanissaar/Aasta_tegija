<?php
/**
 * Created by PhpStorm.
 * User: Rait
 * Date: 28.02.2017
 * Time: 10:33
 */

namespace Aastategija;

//loendi saamine, andmete saamine jms
class Tests
{
static function sendAnswer($user_id, $practical_test_answer, $practical_question_id){

    update("logs", [
        'practical_test_answer'=>$practical_test_answer,
        'practical_test_question_id'=>$practical_question_id], "user_id = $user_id");
    echo "success";
}
}
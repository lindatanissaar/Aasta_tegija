<?php
/**
 * Created by PhpStorm.
 * User: Rait
 * Date: 28.02.2017
 * Time: 10:33
 */

namespace Aastategija;

class Tests
{
    static function sendAnswer($user_id, $practical_test_answer, $practical_question_id)
    {

        update("logs", [
            'practical_test_answer' => $practical_test_answer,
            'practical_test_question_id' => $practical_question_id],
            "user_id = $user_id AND logs_id=(SELECT MAX(logs_id) Where user_id= $user_id)");
        echo "success";
    }

    public static function get_score($submitted_answers, $correct_answers)
    {
        $score = 0;
        foreach ($submitted_answers as $question_id => $answer_id) {
            ("$correct_answers[$question_id] == $answer_id");
            if ($correct_answers[$question_id] == $answer_id)
                $score++;
        }

        return $score;

    }
}
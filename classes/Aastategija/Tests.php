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
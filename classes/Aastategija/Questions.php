<?php
/**
 * Created by PhpStorm.
 * User: Rait
 * Date: 28.02.2017
 * Time: 10:33
 */

namespace Aastategija;

class Questions
{
    static function get()
    {
        $questions = [];

        // Qet questions
        q("SELECT * FROM answers JOIN questions USING (question_id) ORDER BY RAND()", $q);


        // Move answer options under questions
        while($row = mysqli_fetch_assoc($q)){
            $questions[$row['question_id']]['text']= htmlentities($row['text']);
            $questions[$row['question_id']]['answers'][] = [
                'id'=>$row['answer_id'],
                'text'=> htmlentities($row['answer_text']),
                'correct'=>$row['answer']
            ];
        }

        return $questions;
    }




}
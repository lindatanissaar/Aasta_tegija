<?php
/**
 * Created by PhpStorm.
 * User: Linnu
 * Date: 03.04.2017
 * Time: 9:28
 */
namespace Aastategija;
class Users
{
    static function enterantsAdd($firstName, $lastName, $pin)
    {
        insert('users', [
            'firstName' => $firstName,
            'lastName' => $lastName,
            'pin' => $pin
        ]);
    }

    static function adminsAdd($email, $password)
    {
        // Hash the password
        $password = password_hash($password, PASSWORD_DEFAULT);
        insert('users', [
            'email' => $email,
            'password' => $password,
            'is_admin' => 1
        ]);
    }

    public static function set_theoretical_score($user_id, $score)
    {
        insert("logs", [
            'user_id' => $user_id,
            'questions_result' => $score,
        ]);
    }
}
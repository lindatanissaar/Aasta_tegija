<?php
/**
 * Created by PhpStorm.
 * User: Linnu
 * Date: 02.04.2017
 * Time: 15:14
 */

namespace Aastategija;


class Login
{
    static function enterantsAdd($firstName, $lastName, $pin){
        insert('users', [
            'firstName' => $firstName,
            'lastName' => $lastName,
            'pin' => $pin
        ]);

}

    static function adminsAdd($email, $password){
        // Hash the password
        $password = password_hash($password, PASSWORD_DEFAULT);

        insert('users', [
            'email' => $email,
            'password' => $password,
            'is_admin' => 1
        ]);
    }
}
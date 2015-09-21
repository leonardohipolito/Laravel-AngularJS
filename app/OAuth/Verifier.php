<?php
/**
 * Created by PhpStorm.
 * User: leonardo
 * Date: 12/09/15
 * Time: 12:31
 */

namespace FacilitaProject\OAuth;
use Auth;

class Verifier
{
    public function verify($username, $password)
    {
        $credentials = [
            'email'    => $username,
            'password' => $password,
        ];

        if (Auth::once($credentials)) {
            return Auth::user()->id;
        }

        return false;
    }
}
<?php


namespace App\Services\Impl;

use App\Services\UserService;

class UserServiceImpl implements UserService
{
    public array $user = [
        "mirlani" => "rahasia"
    ];

    public function login(string $user, string $password): bool
    {
        if(!isset($this->user[$user]))
        {
            return false;
        }

        $userPassword = $this->user[$user];
        
        return $password == $userPassword;
    }
}

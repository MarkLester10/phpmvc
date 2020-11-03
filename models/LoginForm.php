<?php

namespace app\models;

use marklester\phpmvc\Model;
use marklester\phpmvc\Application;

class LoginForm extends Model
{
    public string $email = '';
    public string $password = '';


    public function rules(): array
    {
        return [
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED],
        ];
    }

    public function labels(): array
    {
        return [
            'email' => 'Email',
            'password' => 'Password',
        ];
    }

    public function login()
    {
        $user = User::findOne(['email' => $this->email]);

        if (!$user) {
            $this->addError('email', 'User with this email address does not exist');
            return false;
        }

        if (!password_verify($this->password, $user->password)) {
            $this->addError('password', 'Password is incorrect');
            return false;
        }

        return Application::$app->login($user);
    }
}

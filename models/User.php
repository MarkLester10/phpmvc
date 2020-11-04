<?php

namespace app\models;

use marklester\phpmvc\UserModel;
use marklester\phpmvc\Application;

class User extends UserModel
{
    const IS_ADMIN = 1;
    const IS_NOT_ADMIN = 0;
    const STATUS_DELETED = 2;

    public string $firstname = '';
    public string $lastname = '';
    public string $email = '';
    public int $isAdmin = self::IS_NOT_ADMIN;
    public string $password = '';
    public string $confirmPassword = '';

    public function tableName(): string
    {
        return 'users';
    }

    //attributes for DB model - simply your table columns
    public function attributes(): array
    {
        return ['firstname', 'lastname', 'email', 'password', 'isAdmin'];
    }

    public function primaryKey(): string
    {
        return 'id';
    }

    public function save()
    {
        $this->isAdmin = self::IS_NOT_ADMIN;
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return parent::save(); //run save method to parent Class - DBModel
    }

    public function rules(): array
    {
        return [
            'firstname' => [self::RULE_REQUIRED],
            'lastname' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL, [self::RULE_UNIQUE, 'class' => self::class, 'attribute' => 'email']],
            'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8], [self::RULE_MAX, 'max' => 24]],
            'confirmPassword' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']],
        ];
    }


    //These are the labels of your form - based on their html name attributes
    public function labels(): array
    {
        return [
            'firstname' => 'First Name',
            'lastname' => 'Last Name',
            'email' => 'Email',
            'password' => 'Password',
            'confirmPassword' => 'Confirm Password'
        ];
    }

    public function getDisplayName(): string
    {
        return ucfirst($this->firstname) . ' ' . ucfirst($this->lastname);
    }

    public function login()
    {
        $user = self::findOne(['email' => $this->email]);
        return Application::$app->login($user);
    }
}
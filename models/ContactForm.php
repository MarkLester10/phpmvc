<?php

namespace app\models;

use marklester\phpmvc\Model;

class ContactForm extends Model
{
    public string $subject = '';
    public string $email = '';
    public string $body = '';

    public function rules(): array
    {
        return [
            'subject' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'body' => [self::RULE_REQUIRED, [self::RULE_MAX, 'max' => 250]]
        ];
    }

    public function labels(): array
    {
        return [
            'subject' => 'Subject',
            'email' => 'Your Email',
            'body' => 'Message'
        ];
    }

    public function send()
    {
        return true;
    }
}

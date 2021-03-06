<?php

namespace System\Form;

use System\Form\Validator\Email;
use System\Form\Validator\Password;

/**
 * Class Login
 * @package System\Form
 */
class Login extends AbstractForm
{
    /**
     * Login constructor.
     * @param $data
     */
    public function __construct($data)
    {

        $this->data = $data;

        $this->validators = [

            new Email('email', $this->data['email']),
            new Password('password', $this->data['email'])

        ];

    }

}
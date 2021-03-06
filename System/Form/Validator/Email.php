<?php

namespace System\Form\Validator;

/**
 * Class Email
 * @package System\Form\Validator
 */
class Email
{
    /**
     * @var
     */
    protected $name;

    /**
     * @var string $value
     */
    protected $value;

    /**
     * Email constructor.
     * @param $name
     * @param $value
     */
    public function __construct($name, $value)
    {
        $this->name = $name;
        $this->value = trim($value);
    }

    /**
     * @return bool
     */
    public function isValid()
    {
//        return (filter_var($this->name, FILTER_VALIDATE_EMAIL) == true) ? true : false;
        if (filter_var($this->value, FILTER_VALIDATE_EMAIL) == true) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return 'Do you think it looks like email?';
    }

}

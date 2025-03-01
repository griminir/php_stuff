<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;


class LoginForm
{
    protected $errors = [];

    function __construct(public array $attributes)
    {
        if (!Validator::email($attributes['email'])) {
            $this->errors['email'] = 'Please provide a valid email address';
        }

        if (!Validator::string($attributes['password'])) {
            $this->errors['password'] = 'Please provide a valid password';
        }
    }

    public static function validate($attributes)
    {
        $instance = new static($attributes);

        return $instance->failed() ? $instance->throw() : $instance;
    }

    public function failed()
    {
        return count($this->errors);
    }

    public function throw()
    {
        ValidationException::throw($this->getErrors(), $this->attributes);
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function error($field, $msg)
    {
        $this->errors[$field] = $msg;

        return $this;
    }
}

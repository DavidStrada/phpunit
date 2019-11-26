<?php

namespace App\Models;

class User
{
    protected $data;
    protected $firstName;
    protected $lastName;
    protected $email;

    // public function __set($name, $value)
    // {
    //     $this->data[$name] = $value;
    // }

    // public function __get($name)
    // {
    //     if (array_key_exists($name, $this->data)) {
    //         return $this->data[$name];
    //     }

    //     $trace = debug_backtrace();
    //     trigger_error(
    //         'Undefined property via __get(): ' . $name .
    //         ' in ' . $trace[0]['file'] .
    //         ' on line ' . $trace[0]['line'],
    //         E_USER_NOTICE);
    //     return null;
    // }

    // public function __call($name, $arguments) {
    //     //do a get
    //     if (preg_match('/^get(.+)/', $name, $matches)) {
    //         $var_name = $matches[1];
    //         return $this->__get($var_name);
    //     }
    //     //do a set
    //     if (preg_match('/^set(.+)/', $name, $matches)) {
    //         $var_name = $matches[1];
    //         $this->__set($var_name, $arguments[0] );
    //     }
    // }

    public function setFirstName($firstName)
    {
        $this->firstName = trim($firstName);
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = trim($lastName);
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function getFullName()
    {
        return "$this->firstName $this->lastName";
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getEmailVariables()
    {
        return [
            'full_name' => $this->getFullName(),
            'email' => $this->getEmail()
        ];
    }
}

<?php

class RegistratieValidator
{

    private $data;
    private $errors = [];
    private static $fields = ['voornaam', 'achternaam', 'email', 'wachtwoord', 'adres', 'plaats', 'zip'];

    public function __construct($post_data)
    {
        $this->data = $post_data;
    }

    public function validateForm()
    {
        foreach (self::$fields as $field) {
            if (!array_key_exists($field, $this->data)) {
                trigger_error("$field is not present in data");
                return;
            }
        }

        $this->validateName();
        $this->validateEmail();
        $this->validatePwd();
        $this->validatePwdRepeat();
        return $this->errors;
    }

    private function validateName()
    {
        $val = trim($this->data['name']);

        if (empty($val)) {
            $this->addError('name', 'Gebruikersnaam moet ingevuld zijn.');
        } else {
            if (!preg_match('/^[a-zA-Z0-9]{2,12}$/', $val)) {
                $this->addError('name', 'Gebruikersnaam moet tussen 2-12 characters zijn.');
            }
        }
    }

    private function validateEmail()
    {
        $val = trim($this->data['email']);

        if (empty($val)) {
            $this->addError('email', 'Email moet ingevuld zijn.');
        } else {
            if (!filter_var($val, FILTER_VALIDATE_EMAIL)) {
                $this->addError('email', 'Het moet een echt email adres zijn.');
            }
        }
    }

    private function validatePwd()
    {
        $val = trim($this->data['pwd']);

        if (empty($val)) {
            $this->addError('pwd', 'Wachtwoord moet ingevuld zijn.');
        } else {
            if (!preg_match('/^[a-zA-Z0-9]{2,12}$/', $val)) {
                $this->addError('pwd', 'Wachtwoord moet tussen de 3-60 characters zijn.');
            }
        }
    }

    private function validatePwdRepeat()
    {
        $val = trim($this->data['pwdRepeat']);
        $val2 = trim($this->data['pwdRepeat']);

        if (empty($val)) {
            $this->addError('pwdRepeat', 'Herhaal wachtwoord mag niet leeg zijn');
        } else {
            if (!$val === $val2) {
                $this->addError('pwdRepeat', 'Wachtwoord moet matchen');
            }
        }
    }

    private function addError($key, $val)
    {
        $this->errors[$key] = $val;
    }
}

class LoginValidator
{
    private $data;
    private $errors = [];
    private static $fields = ['name', 'pwd'];

    public function __construct($post_data)
    {
        $this->data = $post_data;
    }

    public function validateForm()
    {
        foreach (self::$fields as $field) {
            if (!array_key_exists($field, $this->data)) {
                trigger_error("$field is not present in data");
                return;
            }
        }
        $this->validateName();
        $this->validatePwd();
        return $this->errors;
    }

    private function validateName()
    {
        $val = trim($this->data['name']);

        if (empty($val)) {
            $this->addError('name', 'Naam mag niet leeg zijn.');
        } else {
            if (!preg_match('/^[a-zA-Z0-9]{2,12}$/', $val)) {
                $this->addError('name', 'Gebruikersnaam moet tussen 2-12 characters zijn.');
            }
        }
    }

    private function validatePwd()
    {
        $val = trim($this->data['pwd']);

        if (empty($val)) {
            $this->addError('pwd', 'Wachtwoord mag niet leeg zijn');
        } else {
            if (!preg_match('/^[a-zA-Z0-9]{2,12}$/', $val)) {
                $this->addError('pwd', 'Wachtwoord moet tussen de 3-60 characters zijn.');
            }
        }
    }

    private function addError($key, $val)
    {
        $this->errors[$key] = $val;
    }
}
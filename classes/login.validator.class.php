<?php
class LoginValidator
{
    private $data;
    private $errors = [];
    private static $fields = ['voornaam', 'wachtwoord'];

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
        $this->validateVoornaam();
        $this->validateWachtwoord();
        return $this->errors;
    }

    private function validateVoornaam()
    {
        $val = trim($this->data['voornaam']);

        if (empty($val)) {
            $this->addError('voornaam', 'Voornaam mag niet leeg zijn.');
        } else {
            if (!preg_match('/^[a-zA-Z0-9]{3,20}$/', $val)) {
                $this->addError('Voornaam', 'Voornaam moet tussen 3-20 karakters zijn.');
            }
        }
    }

    private function validateWachtwoord()
    {
        $val = trim($this->data['wachtwoord']);

        if (empty($val)) {
            $this->addError('wachtwoord', 'Wachtwoord mag niet leeg zijn');
        } else {
            if (!preg_match('/^[a-zA-Z0-9]{8,20}$/', $val)) {
                $this->addError('wachtwoord', 'Wachtwoord moet tussen de 8-20 karakters zijn.');
            }
        }
    }

    private function addError($key, $val)
    {
        $this->errors[$key] = $val;
    }
}

class BeheerderValidator
{
    private $data;
    private $errors = [];
    private static $fields = ['gebruikersnaam', 'wachtwoord'];

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
        $this->validateGebruikersnaam();
        $this->validateWachtwoord();
        return $this->errors;
    }

    private function validateGebruikersnaam()
    {
        $val = trim($this->data['gebruikersnaam']);

        if (empty($val)) {
            $this->addError('gebruikersnaam', 'Gebruikersnaam mag niet leeg zijn.');
        } else {
            if (!preg_match('/^[a-zA-Z0-9]{5,20}$/', $val)) {
                $this->addError('Voornaam', 'Gebruikersnaam moet tussen 5-20 karakters zijn.');
            }
        }
    }

    private function validateWachtwoord()
    {
        $val = trim($this->data['wachtwoord']);

        if (empty($val)) {
            $this->addError('wachtwoord', 'Wachtwoord mag niet leeg zijn');
        } else {
            if (!preg_match('/^[a-zA-Z0-9]{8,25}$/', $val)) {
                $this->addError('wachtwoord', 'Wachtwoord moet tussen de 8-20 karakters zijn.');
            }
        }
    }

    private function addError($key, $val)
    {
        $this->errors[$key] = $val;
    }
}
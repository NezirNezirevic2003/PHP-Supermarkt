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

        $this->validateVoornaam();
        $this->validateAchternaam();
        $this->validateEmail();
        $this->validateWachtwoord();
        $this->validateAdres();
        $this->validatePlaats();
        $this->validateZip();
        return $this->errors;
    }

    private function validateVoornaam()
    {
        $val = trim($this->data['voornaam']);

        if (empty($val)) {
            $this->addError('voornaam', 'Voornaam mag niet leeg zijn');
        } else {
            if (!preg_match('/^[a-zA-Z0-9]{3,20}$/', $val)) {
                $this->addError('voornaam', 'Voornaam moet tussen 3-20 karakters zijn.');
            }
        }
    }

    private function validateAchternaam()
    {
        $val = trim($this->data['achternaam']);

        if (empty($val)) {
            $this->addError('achternaam', 'Achternaam mag niet leeg zijn');
        } else {
            if (!preg_match('/^[a-zA-Z0-9]{10,30}$/', $val)) {
                $this->addError('achternaam', 'Achternaam moet tussen 10-30 karakters zijn.');
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

    private function validateWachtwoord()
    {
        $val = trim($this->data['wachtwoord']);

        if (empty($val)) {
            $this->addError('wachtwoord', 'Wachtwoord moet ingevuld zijn.');
        } else {
            if (!preg_match('/^[a-zA-Z0-9]{8,20}$/', $val)) {
                $this->addError('wachtwoord', 'Wachtwoord moet tussen de 8-20 karakters zijn.');
            }
        }
    }

    private function validateAdres()
    {
        $val = trim($this->data['adres']);

        if (empty($val)) {
            $this->addError('adres', 'Adres moet ingevuld zijn.');
        } else {
            if (!preg_match('/^[a-zA-Z0-9]{10,40}$/', $val)) {
                $this->addError('adres', 'Adres moet tussen de 10-40 karakters zijn.');
            }
        }
    }

    private function validatePlaats()
    {
        $val = trim($this->data['plaats']);

        if (empty($val)) {
            $this->addError('plaats', 'Plaatsnaam moet ingevuld zijn.');
        } else {
            if (!preg_match('/^[a-zA-Z0-9]{5,20}$/', $val)) {
                $this->addError('plaats', 'plaats moet tussen de 5-20 karakters zijn.');
            }
        }
    }

    private function validateZip()
    {
        $val = trim($this->data['zip']);

        if (empty($val)) {
            $this->addError('zip', 'Zipcode moet ingevuld zijn.');
        } else {
            if (!preg_match('/^[a-zA-Z0-9]{4,6}$/', $val)) {
                $this->addError('zip', 'zipcode moet tussen de 4-6 karakters zijn.');
            }
        }
    }

    private function addError($key, $val)
    {
        $this->errors[$key] = $val;
    }
}
<?php

class MedewerkerValidator
{

    private $data;
    private $errors = [];
    private static $fields = ['voornaam', 'achternaam', 'functie', 'salaris'];

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
        $this->validateFunctie();
        $this->validateSalaris();
        return $this->errors;
    }

    private function validateVoornaam()
    {
        $val = trim($this->data['voornaam']);

        if (empty($val)) {
            $this->addError('voornaam', 'Voornaam mag niet leeg zijn');
        } else {
            if (!preg_match('/^[a-zA-Z]{3,20}$/', $val)) {
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
            if (!preg_match('/^[a-zA-Z]{3,30}$/', $val)) {
                $this->addError('achternaam', 'Achternaam moet tussen 10-30 karakters zijn.');
            }
        }
    }

    private function validateFunctie()
    {
        $val = trim($this->data['functie']);

        if (empty($val)) {
            $this->addError('functie', 'Functie moet ingevuld zijn.');
        } else {
            if (!preg_match('/^[a-zA-Z0-9]{3,20}$/', $val)) {
                $this->addError('functie', 'Functie moet tussen de 3-20 karakters zijn.');
            }
        }
    }

    private function validateSalaris()
    {
        $val = trim($this->data['salaris']);

        if (empty($val)) {
            $this->addError('salaris', 'Salaris moet ingevuld zijn.');
        } else {
            if (!preg_match('/^[0-9]{4,10}$/', $val)) {
                $this->addError('salaris', 'Salaris moet tussen de 4-10 nummers zijn en mag geen letters bevatten.');
            }
        }
    }

    private function addError($key, $val)
    {
        $this->errors[$key] = $val;
    }
}
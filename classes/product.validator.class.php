<?php

class ProductValidator
{

    private $data;
    private $errors = [];
    private static $fields = ['productnaam', 'productomschrijving', 'categorie', 'productprijs'];

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

        $this->validateProductnaam();
        $this->validateProductomschrijving();
        $this->validateCategorie();
        $this->validateProductprijs();
        return $this->errors;
    }

    private function validateProductnaam()
    {
        $val = trim($this->data['productnaam']);

        if (empty($val)) {
            $this->addError('productnaam', 'Productnaam mag niet leeg zijn');
        } else {
            if (!preg_match('/^[a-zA-Z]{2,30}$/', $val)) {
                $this->addError('productnaam', 'Productnaam moet tussen 2-30 karakters zijn en mag geen nummers bevatten');
            }
        }
    }

    private function validateProductomschrijving()
    {
        $val = trim($this->data['productomschrijving']);

        if (empty($val)) {
            $this->addError('productomschrijving', 'Productomschrijving mag niet leeg zijn');
        } else {
            if (!preg_match('/^[a-zA-Z]{5,30}$/', $val)) {
                $this->addError('productomschrijving', 'Productomschrijving moet tussen 5-30 karakters zijn en mag geen nummers bevatten.');
            }
        }
    }

    private function validateCategorie()
    {
        $val = trim($this->data['categorie']);

        if (empty($val)) {
            $this->addError('categorie', 'Een van de categorieen moet geselecteerd zijn');
        }
    }

    private function validateProductprijs()
    {
        $val = trim($this->data['productprijs']);

        if (empty($val)) {
            $this->addError('productprijs', 'productprijs mag niet leeg zijn');
        } else {
            if (!preg_match('/^[0-9]{1,8}$/', $val)) {
                $this->addError('productprijs', 'Productprijs moet tussen 1-8 nummers zijn en mag geen letters bevatten.');
            }
        }
    }

    private function addError($key, $val)
    {
        $this->errors[$key] = $val;
    }
}
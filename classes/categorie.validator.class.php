<?php

class CategorieValidator
{

    private $data;
    private $errors = [];
    private static $fields = ['categorienaam'];

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

        $this->validateCategorienaam();
        return $this->errors;
    }

    private function validateCategorienaam()
    {
        $val = trim($this->data['categorienaam']);

        if (empty($val)) {
            $this->addError('categorienaam', 'Categorienaam mag niet leeg zijn');
        } else {
            if (!preg_match('/^[a-zA-Z]{4,20}$/', $val)) {
                $this->addError('categorienaam', 'Categorienaam moet tussen 4-20 karakters zijn.');
            }
        }
    }

    private function addError($key, $val)
    {
        $this->errors[$key] = $val;
    }
}
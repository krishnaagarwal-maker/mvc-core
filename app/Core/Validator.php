<?php

namespace app\Core;


class Validator
{
    public static function validate($data, $rules)
    {
        $errors = [];
        foreach ($rules as $field => $fieldRules) {
            foreach ($fieldRules as $rule) {
                if ($rule === 'required') {

                    if (!isset($data[$field]) || trim($data[$field]) === '') {
                        $errors[$field] = $field . ' is required';
                        break;
                    }
                }
                if ($rule === 'email') {
                    if (isset($data[$field]) && !filter_var($data[$field], FILTER_VALIDATE_EMAIL)) {
                        $errors[$field] = 'Invalid email';
                        break;
                    }
                }
                if ($rule === 'integer') {
                    if (isset($data[$field]) && !filter_var($data[$field], FILTER_VALIDATE_INT) ) {
                        $errors[$field] = $field . ' must be an integer';
                        break;
                    }
                }
            }
        }
        return $errors;
    }
}
?>
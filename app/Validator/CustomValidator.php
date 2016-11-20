<?php
namespace App\Validator;

class CustomValidator extends \Illuminate\Validation\Validator
{
    public function validateTeamName($attribute, $value, $parameters)
    {
        return preg_match('/^[0-9a-z-]+$/', $value);
    }
}

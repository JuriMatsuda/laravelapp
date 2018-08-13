<?php

namespace App\Http\Validators;

use Illuminate\Validation\Validator;

class HelloValidators extends Validator
{
    /**
     * 入力された値（$value）が偶数なら許可、奇数なら不許可
     *
     * @param $attribute
     * @param $value
     * @param $parameters
     * @return bool
     */
    public function validateHello($attribute, $value, $parameters)
    {
        return $value % 2 == 0;
    }
}

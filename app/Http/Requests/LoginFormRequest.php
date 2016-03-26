<?php

namespace App\Http\Requests;

/**
 * Class LoginFormRequest
 *
 * @package    App\Http\Requests
 * @subpackage App\Http\Requests\LoginFormRequest
 */
class LoginFormRequest extends Request
{

    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'username' => 'required|min:5',
            'password' => 'required|min:6',
        ];
    }
}
<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Auth\Guard;

/**
 * Class UserFormRequest
 *
 * @package    App\Http\Requests
 * @subpackage App\Http\Requests\UserFormRequest
 */
class UserFormRequest extends Request
{

    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * @param Guard $guard
     *
     * @return array
     */
    public function rules(Guard $guard)
    {
        $id = null;
        if (null !== $user = $guard->user()) {
            $id = $user->getId();
        }

        return [
            'username' => 'required|min:5|unique:App\Entities\User,username' . ($id ? ',' . $id : ''),
            'email'    => 'required|email',
            'password' => 'required|confirmed|min:6',
        ];
    }
}
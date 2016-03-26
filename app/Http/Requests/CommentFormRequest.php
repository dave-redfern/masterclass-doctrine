<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Auth\Guard;

/**
 * Class CommentFormRequest
 *
 * @package    App\Http\Requests
 * @subpackage App\Http\Requests\CommentFormRequest
 */
class CommentFormRequest extends Request
{

    /**
     * @param Guard $guard
     *
     * @return bool
     */
    public function authorize(Guard $guard)
    {
        return $guard->user();
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'comment' => 'required|min:10',
        ];
    }
}
<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Auth\Guard;

/**
 * Class StoryFormRequest
 *
 * @package    App\Http\Requests
 * @subpackage App\Http\Requests\StoryFormRequest
 */
class StoryFormRequest extends Request
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
            'headline' => 'required|min:5|max:500',
            'url'      => 'required|url|max:500',
        ];
    }
}
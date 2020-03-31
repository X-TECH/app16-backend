<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class DeleteSingleApplicationRequest
 *
 * @property string device_token
 *
 * @package App\Http\Requests
 */
class DeleteSingleApplicationRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'device_token' => [
                'required',
            ],
        ];
    }
}

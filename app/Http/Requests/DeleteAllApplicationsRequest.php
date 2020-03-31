<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class DeleteAllApplicationsRequest
 *
 * @property string device_token
 *
 * @package App\Http\Requests
 */
class DeleteAllApplicationsRequest extends FormRequest
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

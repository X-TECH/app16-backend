<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string device_token
 *
 * @property string first_name
 * @property string middle_name
 * @property string last_name
 *
 * @property string out_datetime
 * @property string out_address
 *
 * @property string visiting_address_and_name
 * @property string visiting_reason
 * @property string planned_return_datetime
 */
class CreateApplicationRequest extends FormRequest
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

            'first_name' => [
                'required',
            ],
            'middle_name' => [
                'required',
            ],
            'last_name' => [
                'required',
            ],

            'out_datetime' => [
                'required',
                'date',
                'after:now',
            ],
            'out_address' => [
                'required',
            ],

            'visiting_address_and_name' => [
                'required',
            ],

            'visiting_reason' => [
                'required',
            ],

            'planned_return_datetime' => [
                'required',
                'date',
                'after:out_datetime',
            ]
        ];
    }
}

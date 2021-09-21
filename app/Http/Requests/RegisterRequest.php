<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'mail_address' => 'required|email|max:100|unique:users',
            'password' => 'required|alpha|max:255',
            'password_cf' => 'required|same:password',
            'name' => 'required|max:255',
            'address' => 'max:255',
            'phone' => 'alpha_num|max:15'
        ];
    }
    public function messages()
    {
        return [
            'mail_address.required' => trans('messages.mail_address_required'),
            'mail_address.email' => trans('messages.mail_address_email'),
            'mail_address.max' => trans('messages.mail_address_max'),
            'mail_address.unique' => trans('messages.mail_address_unique'),

            'password.required' => trans('messages.password_required'),
            'password.alpha' => trans('messages.password_alpha'),
            'password.max' => trans('messages.password_max'),

            'password_cf.required' => trans('messages.password_cf_required'),
            'password_cf.same' => trans('messages.password_cf_same'),

            'name.required' => trans('messages.name_required'),
            'name.max' => trans('messages.name_max'),

            'address.max' => trans('messages.address_max'),

            'phone.alpha_num' => trans('messages.phone_alpha_num'),
            'phone.max' => trans('messages.phone_max'),
        ];
    }
}

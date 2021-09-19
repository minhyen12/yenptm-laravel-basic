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
            'mail_address' => 'bail|required|email|max:100|unique:users',
            'password' => 'bail|required|alpha|max:255',
            'password_cf' => 'bail|required|same:password',
            'name' => 'bail|required|max:255',
            'address' => 'bail|max:255',
            'phone' => 'bail|alpha_num|max:15'
        ];
    }
    public function messages()
    {
        return [
            'mail_address.required' => 'Email không được để trống',
            'mail_address.email' => 'Email không đúng định dạng',
            'mail_address.max' => 'Address không vượt quá 100 ký tự',
            'mail_address.unique' => 'Email là duy nhất',

            'password.required' => 'Password không được để trống',
            'password.alpha' => 'Password dạng text',
            'password.max' => 'Password không vượt quá 255 ký tự',

            'password_cf.required' => 'Password confirm không được để trống',
            'password_cf.same' => 'Password không trùng khớp',

            'name.required' => 'Name không được để trống',
            'name.max' => 'Name không vượt quá 255 ký tự',

            'address.max' => 'Address không vượt quá 255 ký tự',

            'phone.alpha_num' => 'Phone chỉ gồm các số',
            'phone.max' => 'Phone không vượt quá 15 ký tự',
        ];
    }
}

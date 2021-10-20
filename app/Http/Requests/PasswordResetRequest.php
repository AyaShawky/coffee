<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordResetRequest extends FormRequest
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
            'password' => 'required|string|min:8|max:200|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'password.required' => 'لم يتم ادخال كلمة السر',
            'password.confirmed' => 'تأكيد كلمة السر خطأ',
            'password.min' => 'كلمة السر يجب ان تتكون 8 حروف',
            'password.max' => 'تجاوز طول كلمة السر عدد الحروف المسموحة',
        ];
    }
}

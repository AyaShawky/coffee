<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:200|unique:admins',
            'password' => 'required|string|min:8|max:200|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'لم يتم ادخال اسم المشرف',
            'email.email' => 'صيغة البريد الالكتروني خاطئة',
            'name.max' => 'تجاوز اسم المشرف عدد الحروف المسموحة',
            'name.string' => 'اسم المشرف يجب ان يكون نص',
            'email.unique' => 'البريد الالكتروني مستخدم',
            'email.required' => 'لم يتم ادخال البريد الالكتروني',
            'email.max' => 'تجاوز البريد الالكتروني عدد الحروف المسموحة',
            'password.required' => 'لم يتم ادخال كلمة السر',
            'password.confirmed' => 'تأكيد كلمة السر خطأ',
            'password.min' => 'كلمة السر يجب ان تتكون 8 حروف',
            'password.max' => 'تجاوز طول كلمة السر عدد الحروف المسموحة',
        ];
    }
}

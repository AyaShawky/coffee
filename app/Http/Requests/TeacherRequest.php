<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends FormRequest
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
            'email' => 'required|email|max:200|unique:teachers',
            'password' => 'required|string|min:8|max:200|confirmed',
            'bio' => 'required|string|max:9999',
            'image' => 'required|image|max:1999',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'لم يتم ادخال اسم المدرس',
            'email.email' => 'صيغة البريد الالكتروني خاطئة',
            'bio.required' => 'لم يتم ادخال وصف المدرس',
            'image.required' => 'لم يتم ادخال صورة المدرس',
            'name.max' => 'تجاوز اسم المدرس عدد الحروف المسموحة',
            'description.max' => 'تجاوز وصف المدرس عدد الحروف المسموحة',
            'image.max' => 'حجم الصورة اكبر من السموح به',
            'image.image' => 'الملف المدخل ليس صورة',
            'name.string' => 'اسم المدرس يجب ان يكون نص',
            'description.string' => 'وصف المدرس يجب ان يكون نص',
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

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacheUpdaterRequest extends FormRequest
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
        $id = $this->request->get('teacher_id');

        return [
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:200|unique:teachers,email,'.$id.'',
            'bio' => 'required|string|max:9999',
            'image' => 'image|max:1999',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'لم يتم ادخال اسم المدرس',
            'email.email' => 'صيغة البريد الالكتروني خاطئة',
            'bio.required' => 'لم يتم ادخال وصف المدرس',
            'name.max' => 'تجاوز اسم المدرس عدد الحروف المسموحة',
            'description.max' => 'تجاوز وصف المدرس عدد الحروف المسموحة',
            'image.max' => 'حجم الصورة اكبر من السموح به',
            'image.image' => 'الملف المدخل ليس صورة',
            'name.string' => 'اسم المدرس يجب ان يكون نص',
            'description.string' => 'وصف المدرس يجب ان يكون نص',
            'email.unique' => 'البريد الالكتروني مستخدم',
            'email.required' => 'لم يتم ادخال البريد الالكتروني',
            'email.max' => 'تجاوز البريد الالكتروني عدد الحروف المسموحة',
        ];
    }
}

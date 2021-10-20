<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
        $id = $this->request->get('user_id');
        return [
            'name' => 'required|string|max:100',
            'school' => 'required|string|max:100',
            'address' => 'required|string|max:190',
            'mobile_number' => 'required|regex:/^(05)[0-9]+$/|max:10|min:10',
            'gpa' => 'required|numeric|max:100|min:0',
            'email' => 'required|email|max:200|unique:users,email,'.$id.'',
            'image' => 'image|max:1999',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'لم يتم ادخال اسم الطالب',
            'school.required' => 'لم يتم ادخال اسم المدرسة',
            'address.required' => 'لم يتم ادخال العنوان',
            'mobile_number.required' => 'لم يتم ادخال رقم الجوال',
            'gpa.required' => 'لم يتم ادخال المعدل',
            'name.max' => 'تجاوز اسم الطالب عدد الحروف المسموحة',
            'school.max' => 'تجاوز اسم المدرسة عدد الحروف المسموحة',
            'address.max' => 'تجاوز العنوان عدد الحروف المسموحة',
            'mobile_number.max' => 'رقم الجوال يجب ان يكون 10 ارقام',
            'mobile_number.regex' => 'مقدمة رقم الجوال خاطئة',
            'mobile_number.min' => 'رقم الجوال يجب ان يكون 10 ارقام',
            'gpa.max' => 'يجب ان يكون المعدل قيمة من 0 الى 100',
            'gpa.min' => 'يجب ان يكون المعدل قيمة من 0 الى 100',
            'gpa.numeric' => 'يجب ان يكون المعدل ارقام',
            'name.string' => 'اسم الطالب يجب ان يكون نص',
            'email.unique' => 'البريد الالكتروني مستخدم',
            'email.email' => 'صيغة البريد الالكتروني خاطئة',
            'email.required' => 'لم يتم ادخال البريد الالكتروني',
            'email.max' => 'تجاوز البريد الالكتروني عدد الحروف المسموحة',
            'image.max' => 'حجم الصورة اكبر من السموح به',
            'image.image' => 'الملف المدخل ليس صورة',
        ];
    }
}

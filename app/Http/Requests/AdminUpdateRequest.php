<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminUpdateRequest extends FormRequest
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
        $id = $this->request->get('admin_id');
        return [
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:200|unique:admins,email,'.$id.'',
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
        ];
    }
}

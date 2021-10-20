<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SectionRequest extends FormRequest
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
            'description' => 'required|string|max:9999',
            'image' => 'required|image|max:1999',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'لم يتم ادخال اسم القسم',
            'description.required' => 'لم يتم ادخال وصف القسم',
            'image.required' => 'لم يتم ادخال صورة القسم',
            'name.max' => 'تجاوز اسم التخصص عدد الحروف المسموحة',
            'description.max' => 'تجاوز وصف التخصص عدد الحروف المسموحة',
            'image.max' => 'حجم الصورة اكبر من السموح به',
            'image.image' => 'الملف المدخل ليس صورة',
            'name.string' => 'اسم القسم يجب ان يكون نص',
            'description.string' => 'وصف القسم يجب ان يكون نص',
        ];
    }
}

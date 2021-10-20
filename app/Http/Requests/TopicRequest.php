<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TopicRequest extends FormRequest
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
            'course_id' => 'required|exists:courses,id',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'لم يتم ادخال اسم الوحدة',
            'course_id.required' => 'لم يتم اختيار المادة',
            'course_id.exists' => 'المادة غير موجود',
            'name.max' => 'تجاوز اسم الوحدة عدد الحروف المسموحة',
            'name.string' => 'اسم الوحدة يجب ان يكون نص',
        ];
    }
}

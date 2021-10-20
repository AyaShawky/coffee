<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseUpdateRequest extends FormRequest
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
            'price' => 'required|numeric|min:0',
            'description' => 'required|string|max:9999',
            'image' => 'image|max:1999',
            'section_id' => 'required|exists:sections,id',
            'teacher_id' => 'required|exists:teachers,id',
//            'preview_video' => 'mimetypes:video/x-ms-asf,video/x-flv,video/mp4,application/x-mpegURL,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'لم يتم ادخال اسم المادة',
            'price.required' => 'لم يتم ادخال سعر المادة',
            'price.min' => 'سعر المادة يجب ان يكون رقم',
            'price.numeric' => 'سعر المادة يجب ان يكون رقم',
//            'preview_video.mimetypes' => 'صيغة الفيديو غير مقبولة',
            'section_id.required' => 'لم يتم اختيار القسم',
            'section_id.exists' => 'الفسم غير موجود',
            'teacher_id.required' => 'لم يتم اختيار المدرس',
            'teacher_id.exists' => 'المدرس غير موجود',
            'description.required' => 'لم يتم ادخال وصف المادة',
            'name.max' => 'تجاوز اسم المادة عدد الحروف المسموحة',
            'description.max' => 'تجاوز وصف المادة عدد الحروف المسموحة',
            'image.max' => 'حجم الصورة اكبر من السموح به',
            'image.image' => 'الملف المدخل ليس صورة',
            'name.string' => 'اسم المادة يجب ان يكون نص',
            'description.string' => 'وصف المادة يجب ان يكون نص',
        ];
    }
}

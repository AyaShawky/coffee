<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LessonRequest extends FormRequest
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
            'video' => 'required|string|max:190',
//            'video' => 'required|mimetypes:video/x-ms-asf,video/x-flv,video/mp4,application/x-mpegURL,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'لم يتم ادخال اسم الدرس',
            'video.required' => 'لم يتم ادخال الفيديو',
            'video.string' => 'رابط الفيديو يجب ان يكون نص',
            'video.max' => 'حجم رابط الفيديو تجاوز الحد المسموح',
            'name.max' => 'تجاوز اسم الدرس عدد الحروف المسموحة',
            'name.string' => 'اسم الدرس يجب ان يكون نص',
//            'video.required' => 'لم يتم ادخال فيديو الدرس',
//            'video.mimetypes' => 'صيغة الفيديو غير مقبولة',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|max:255',
            'images' => 'required|max:6',
            'id_district' => 'required',
            'id_ward' => 'required',
            'acreage' => 'required',
            'rent' => 'required',
            'type_house' =>'required|exists:type_houses,id',
            'electric_price' => 'required',
            'water_price' => 'required'
        ];
    }
    public function messages(): array
    {
        return [
            'title.required' => 'Vui lòng nhập tiêu đề.',
            'title.max' => 'Độ dài tiêu đề quá 255 ký tự.',
            'images.required' => 'Chọn ít nhất 1 ảnh.',
            'images.max' => 'Chọn đối đa 6 ảnh',
            'id_district.required' => 'Vui lòng chọn địa chỉ.',
            'id_ward.required' => 'Vui lòng chọn địa chỉ.',
            'acreage.required' => 'Vui lòng nhập diện tích.',
            'rent.required' => 'Vui lòng nhập giá phòng.',
            'electric_price.required' => 'Vui lòng nhập giá phòng.',
            'water_price.required' => 'Vui lòng nhập giá phòng.',
            'type_house.required' => 'Vui lòng chọn loại hình nhà',
            'type_house.exists' => 'Loại hình nhà không hợp lệ',

        ];
    }
}

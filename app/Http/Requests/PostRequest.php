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
            'id_district' => 'required|exists:districts,id',
            'id_ward' => 'required|exists:wards,id',
            'acreage' => 'required|numeric|min:1|max:500',
            'rent' => 'required|numeric|min:0|max:50000000',
            'type_house' => 'required|exists:type_houses,id',
            'electric_price' => 'required|numeric|min:0|max:100000',
            'water_price' => 'required|numeric|min:0|max:1000000'
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
            'id_district.exists' => 'Địa chỉ không hợp lệ.',
            'id_ward.required' => 'Vui lòng chọn địa chỉ.',
            'id_ward.exists' => 'Địa chỉ không hợp lệ.',
            'acreage.required' => 'Vui lòng nhập diện tích.',
            'acreage.numeric' => 'Diện tích phòng không hợp lệ.',
            'acreage.min' => 'Diện tích phòng không hợp lệ.',
            'acreage.max' => 'Diện tích phòng không hợp lệ.',
            'rent.required' => 'Vui lòng nhập giá phòng.',
            'electric_price.required' => 'Vui lòng nhập giá phòng.',
            'water_price.required' => 'Vui lòng nhập giá phòng.',
            'type_house.required' => 'Vui lòng chọn loại hình nhà',
            'type_house.exists' => 'Loại hình nhà không hợp lệ',
        ];
    }
}

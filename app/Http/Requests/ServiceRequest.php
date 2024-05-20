<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
            'services_name' => 'required|max:255',
            'icon' => 'required:max:255'
        ];
        
    }
    public function messages(): array
    {
        return [
            'services_name.required' => 'Vui lòng nhập tên dịch vụ.',
            'services_name.max' => 'Độ dài quá 255 ký tự.',
            'icon.required' => 'Vui lòng nhập mã html icon.',
            'icon.max' => 'Độ dài quá 255 ký tự'
        ];
    }
}

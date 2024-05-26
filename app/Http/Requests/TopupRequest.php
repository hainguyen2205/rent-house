<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TopupRequest extends FormRequest
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
            // 'bankcode' => 'required',
            'amount' => 'required|numeric|min:10000|max:5000000',
        ];
    }
    public function messages(): array
    {
        return [
            // 'bankcode.required' => 'Vui lòng chọn ngân hàng.',
            'amount.required' => 'Vui lòng nhập số tiền.',
            'amount.min' => 'Số tiền phải lớn hơn 10.000đ',
            'amount.numeric' => 'Số tiền không hợp lệ',
            'amount.max' => 'Số tiền không quá 5.000.000đ'
        ];
    }
}

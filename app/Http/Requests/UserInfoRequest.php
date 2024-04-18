<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserInfoRequest extends FormRequest
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
            'name' => 'required',
            'password' => 'nullable|min:5|max:16',
            'repassword' => 'nullable|min:5|max:16|same:password',
            'date_of_birth' => 'nullable|date'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Vui lòng nhập tên đầy đủ.',
            'password.min' => 'Mật khẩu phải chứa ít nhất 5 ký tự.',
            'password.max' => 'Mật khẩu không được vượt quá 16 ký tự.',
            'repassword.min' => 'Mật khẩu nhập lại phải chứa ít nhất 5 ký tự.',
            'repassword.max' => 'Mật khẩu nhập lại không được vượt quá 16 ký tự.',
            'repassword.same' => 'Mật khẩu nhập lại phải giống với mật khẩu đã nhập.',
            'date_of_birth.date' => 'Ngày sinh không hợp lệ.'
        ];
    }
}

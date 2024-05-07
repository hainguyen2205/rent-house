<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        if ($this->isMethod('post')) {
            if ($this->is('register')) {
                return [
                    'name' => 'required|alpha',
                    'phone' => 'required|regex:/[0-9]{10}/|unique:users,phone',
                    'password' => 'min:5|max:16',
                    'repassword' => 'min:5|max:16|same:password',
                ];
            }
            if ($this->is('login')) {
                return [
                    'phone' => 'required|regex:/^0[0-9]{9}$/',
                    'password' => 'required|min:5|max:16',
                ];
            }
            if ($this->is('profile/update')) {
                return [
                    'name' => 'required',
                    'avatar_url' => 'nullable',
                    'password' => 'nullable|min:5|max:16',
                    'repassword' => 'nullable|min:5|max:16|same:password|required_with:password',
                    'date_of_birth' => 'nullable|date'
                ];
            }
            if ($this->is('admin/user/create')) {
                return [
                    'avatar_url' => 'nullable',
                    'name' => 'required|alpha',
                    'phone' => 'required|regex:/[0-9]{10}/|unique:users,phone',
                    'password' => 'required|min:5|max:16',
                ];
            }
        }
        return [];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Vui lòng nhập tên đầy đủ.',
            'name.alpha' => 'Tên đầy đủ không hợp lệ.',
            'phone.required' => 'Nhập số điện thoại.',
            'phone.regex' => 'Số điện thoại không hợp lệ.',
            'phone.unique' => 'Số điện thoại đã được đăng ký.',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Mật khẩu phải chứa ít nhất 5 ký tự.',
            'password.max' => 'Mật khẩu không được vượt quá 16 ký tự.',
            'date_of_birth.date' => 'Ngày sinh không hợp lệ.',
            'repassword.min' => 'Mật khẩu nhập lại phải chứa ít nhất 5 ký tự.',
            'repassword.max' => 'Mật khẩu nhập lại không được vượt quá 16 ký tự.',
            'repassword.same' => 'Mật khẩu nhập lại phải giống với mật khẩu đã nhập.',
            'repassword.required_with' => 'Vui lòng nhập lại mật khẩu',
        ];
    }
}

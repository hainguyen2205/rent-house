<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
        $rules = [];
        if ($this->isMethod('post')) {
            switch ($this->getPathInfo()) {
                case '/register':
                    $rules = [
                        'name' => 'required|regex:/^[^0-9]*$/',
                        'phone' => 'required|regex:/[0-9]{10}/|unique:users,phone',
                        'email' => 'required|email',
                        'password' => 'min:5|max:16',
                        'repassword' => 'min:5|max:16|same:password',
                    ];
                    break;
                case '/login':
                    $rules = [
                        'phone' => 'required|regex:/^0[0-9]{9}$/',
                        'password' => 'required|min:5|max:16',
                    ];
                    break;
                case '/profile/update':
                    $rules = [
                        'name' => 'required|regex:/^[^0-9]*$/',
                        'avatar_url' => 'nullable',
                        'email' => 'required|email',
                        'password' => 'nullable|min:5|max:16',
                        'repassword' => 'nullable|min:5|max:16|same:password|required_with:password',
                        'date_of_birth' => 'nullable|date',
                        'gender_id' => 'nullable|exists:genders,id',
                    ];
                    break;
                case '/admin/user/create':
                    $rules =  [
                        'avatar_url' => 'nullable',
                        'name' => 'required|regex:/^[^0-9]*$/',
                        'gender_id' => 'nullable|exists:genders,id',
                        'phone' => 'required|regex:/[0-9]{10}/|unique:users,phone',
                        'email' => 'required|email',
                        'date_of_birth' => 'nullable|date',
                        'address'=>'nullable',
                        'role' => 'required|exists:roles,id',
                        'account_balance' => 'required|numeric',
                        'password' => 'required|min:5|max:16',
                    ];
                    break;
                case '/admin/user/update':
                    $userId = $this->input('id');
                    $rules =  [
                        'avatar_url' => 'nullable',
                        'name' => 'required|regex:/^[^0-9]*$/',
                        'gender_id' => 'nullable|exists:genders,id',
                        'phone' => [
                            'required',
                            'regex:/^[0-9]{10}$/',
                            Rule::unique('users', 'phone')->ignore($userId),
                        ],
                        'email' => 'required|email',
                        'date_of_birth' => 'nullable|date',
                        'address'=>'nullable',
                        'role' => 'required|exists:roles,id',
                        'account_balance' => 'required|numeric',
                        'password' => 'nullable|min:5|max:16',
                    ];
                    break;
                default:
                    # code...
                    break;
            }
        }
        return $rules;
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Vui lòng nhập tên đầy đủ.',
            'name.regex' => 'Tên đầy đủ không hợp lệ.',
            'name.alpha' => 'Tên đầy đủ không hợp lệ.',
            'phone.required' => 'Nhập số điện thoại.',
            'phone.regex' => 'Số điện thoại không hợp lệ.',
            'email.required' => 'Vui lòng nhập địa chỉ email.',
            'email.email' => 'Địa chỉ email không hợp lệ.',
            'phone.unique' => 'Số điện thoại đã được đăng ký.',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Mật khẩu phải chứa ít nhất 5 ký tự.',
            'password.max' => 'Mật khẩu không được vượt quá 16 ký tự.',
            'date_of_birth.date' => 'Ngày sinh không hợp lệ.',
            'repassword.min' => 'Mật khẩu nhập lại phải chứa ít nhất 5 ký tự.',
            'repassword.max' => 'Mật khẩu nhập lại không được vượt quá 16 ký tự.',
            'repassword.same' => 'Mật khẩu nhập lại phải giống với mật khẩu đã nhập.',
            'repassword.required_with' => 'Vui lòng nhập lại mật khẩu',
            'role.required' => 'Vui lòng chọn phân quyền',
            'role.exists' => 'Phân quyền không hợp lệ',
            'account_balance.required' => 'Vui lòng nhập số dư',
            'account_balance.numeric' => 'Số dư không hợp lệ',
            'gender_id.exists' => 'Giới tính được chọn không hợp lệ.'
        ];
    }
}

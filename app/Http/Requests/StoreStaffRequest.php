<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStaffRequest extends FormRequest
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
            'name'=>'required|max:100|min:3',
            'birthday' => 'required',
            'email'=>'required|email|unique:staffs,email|max:100',
            'phone' => 'required|numeric|digits:10',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập tên thành viên',
            'email.required' => 'Bạn chưa nhập email',
            'birthday.required' => 'Bạn chưa nhập ngày sinh',
            'email.unique' => 'Email này đã tồn tại',
            'phone.numeric' => 'SDT là số',
            'phone.required' => 'Nhập số điện thoại',
            'phone.digits' => 'Nhập đúng số điện thoại 10 số',
            'password.required' => 'Bạn chưa nhập Mật khẩu',
        ];
    }
}

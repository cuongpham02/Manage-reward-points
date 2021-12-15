<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePointRequest extends FormRequest
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
             'desc'=>'required|max:100|unique:points,desc|min:3',
            'number_point' => 'required|numeric|between:-10,10',
        ];
    }
    public function messages()
    {
        return [
            'desc.required' => 'Bạn chưa nhập tên sản phẩm',
            'desc.unique' => 'Tiêu chí này đã tồn tại',
            'number_point.between' => 'Điểm từ -10->10',
            'number_point.required' => 'Bạn chưa nhập điểm',
            'number_point' => 'Nhập số',
        ];
    }
}

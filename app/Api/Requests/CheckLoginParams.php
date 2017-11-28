<?php

namespace App\Api\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckLoginParams extends FormRequest
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
            'username'  =>  'bail|required|min:6|max:20',
            'password'  =>  'bail|required|min:6|max:20',
        ];
    }

    public function messages()
    {
        return [
                'username.required'     =>  '请输入用户名',
                'username.min'          =>  '用户名介于6-30字符之间',
                'username.max'          =>  '用户名介于6-30字符之间',

                'password.required'     =>  '密码不能为空',
                'password.min'          =>  '密码介于6-30字符之间',
                'password.max'          =>  '密码介于6-30字符之间',
        ];
    }
}

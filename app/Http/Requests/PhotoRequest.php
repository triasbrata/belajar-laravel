<?php

namespace App\Http\Requests;

class UserRequest extends Request
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
        $o = [
            'name' => 'required',
            'email' => 'required|email',
        ];
        //for 5.2 < only
        if (null != $this->password && !empty($this->password)) {
            $o['password'] = 'required|confirmed';
        }

        return $o;
    }

    public function withValidation($validate)
    {
        $validate->sometimes('password', 'required|confirmed', function ($input) {
            return null != $input->password && !empty($input->password);
        });
    }
}

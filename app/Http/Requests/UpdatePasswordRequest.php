<?php

namespace App\Http\Requests;

use Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class UpdatePasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    public function prepareForValidation()
    {
        if (Hash::check($this->get('password'), auth()->user()->password)) {
            $this->merge(['password' => auth()->user()->password]);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'password' => 'required|in:' . auth()->user()->password,
            'new_password' => 'required|between:8,255|confirmed',
        ];
    }
}

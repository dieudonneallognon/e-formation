<?php

namespace App\Http\Requests;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

class StoreFormationRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'designation' => 'required|string|max:255|unique:formations',
            'description' => 'required|string',
            'image' => 'required|image',
            'price' => 'required|numeric',
            'chapters' => 'required|array|',
            'categories' => 'required|array',
        ];
    }
}

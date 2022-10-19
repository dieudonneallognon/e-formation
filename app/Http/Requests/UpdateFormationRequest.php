<?php

namespace App\Http\Requests;

use Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateFormationRequest extends FormRequest
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
            'designation' => 'required|string|max:255|' . Rule::unique('formations')->ignore($this->designation, 'designation'),
            'description' => 'required|string',
            'image' => 'image',
            'price' => 'required|numeric',
            'chapters' => 'required|array|max:255',
            'categories' => 'required|array|exists:categories,id',
        ];
    }
}

<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
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
            'name' => 'required|string|unique:users,name,' . $this->id . ',id',
            'website' => 'required|url',
            'email' => 'required|email|max:255|string|unique:users,email,' . $this->id . ',id',
            'role' => 'required|exists:roles,id',
        ];
    }
}

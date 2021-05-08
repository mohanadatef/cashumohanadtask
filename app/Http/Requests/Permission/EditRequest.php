<?php

namespace App\Http\Requests\Permission;

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
                'name'=>'required|string|unique:permissions,name,'.$this->id.',id',
                'show_name'=>'required|string|unique:permissions,show_name,'.$this->id.',id',
                'description'=>'required|string',
            ];

    }
}

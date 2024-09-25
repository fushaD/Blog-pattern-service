<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules($action): array
    {
        if($action == 'create'){
            return [
                'name' => 'required|string|min:5',
                'email' => 'required|email|unique:users,email',
                "password" => 'required|min:8|max:40'
            ];
        } else if($action == 'update'){
            return [
                'name' => 'sometimes|string|min:5',
                'email' => 'sometimes|email|unique:users,email',
                "password" => 'sometimes|min:8|max:40'
            ];
        }

    }
}

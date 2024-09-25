<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
                'post_id' => 'required|integer|exists:posts,id',
                'user_id' => 'required|integer|exists:users,id',
                'body' => 'required|string',
                'is_approved' => 'boolean',
            ];
        } else if($action == 'update'){
            return [
            ];
        }
    }
}

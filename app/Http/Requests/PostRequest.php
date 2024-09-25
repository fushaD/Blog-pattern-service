<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
                'title' => 'sometimes|required|string|max:255',
                'body' => 'sometimes|required|string',
                'slug' => 'sometimes|required|string|max:255|unique:posts,slug,' . $id,
                'user_id' => 'sometimes|required|integer|exists:users,id',
                'category' => 'sometimes|nullable|string|max:255',
                'tags' => 'sometimes|nullable|string|max:255',
                'is_published' => 'sometimes|boolean',
                'published_at' => 'sometimes|nullable|date',
                'views' => 'sometimes|nullable|integer',
                'featured_image' => 'sometimes|nullable|string|max:255',
                'excerpt' => 'sometimes|nullable|string|max:255',
                'reading_time' => 'sometimes|nullable|integer',
                'likes' => 'sometimes|nullable|integer',
                'shares' => 'sometimes|nullable|integer',
                'metadata' => 'sometimes|nullable|json',
            ];
        } else if($action == 'update'){
            return [
                'title' => 'sometimes|required|string|max:255',
                'body' => 'sometimes|required|string',
                'slug' => 'sometimes|required|string|max:255|unique:posts,slug,' . $id,
                'user_id' => 'sometimes|required|integer|exists:users,id',
                'category' => 'sometimes|nullable|string|max:255',
                'tags' => 'sometimes|nullable|string|max:255',
                'is_published' => 'sometimes|boolean',
                'published_at' => 'sometimes|nullable|date',
                'views' => 'sometimes|nullable|integer',
                'featured_image' => 'sometimes|nullable|string|max:255',
                'excerpt' => 'sometimes|nullable|string|max:255',
                'reading_time' => 'sometimes|nullable|integer',
                'likes' => 'sometimes|nullable|integer',
                'shares' => 'sometimes|nullable|integer',
                'metadata' => 'sometimes|nullable|json',
                ];
        }

    }
}

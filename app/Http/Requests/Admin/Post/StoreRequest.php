<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string',
            'content' => 'required|string',
            'preview_image' => 'required|file',
            'main_image' => 'required|file',
            'category_id' => 'required|integer|exists:categories,id',
            'tag_ids' => 'nullable|array',
            'tag_id.*' => 'nullable|integer|exists:tags,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'This field is required',
            'title.string' => 'This field should be string',
            'content.required' => 'This field is required',
            'content.string' => 'This field should be string',
            'preview_image.required' => 'This field is required',
            'preview_image.file' => 'You should choose a file',
            'main_image.required' => 'This field is required',
            'main_image.file' => 'You should choose a file',
            'category_id.required' => 'This field is required',
            'category_id.integer' => 'ID category should be an integer',
            'category_id.exists' => 'ID category should exist',
            'tags_ids.array' => 'You should send an array of data',
        ];
    }
}

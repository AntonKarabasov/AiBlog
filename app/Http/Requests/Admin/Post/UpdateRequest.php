<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'preview_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'category_id' => 'required|integer|exists:categories,id',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'nullable|integer|exists:tags,id'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Поле обязательно для заполнения',
            'title.string' => 'Поле должно быть строкой',
            'content.required' => 'Поле обязательно для заполнения',
            'content.string' => 'Поле должно быть строкой',
            'preview_image.image' => 'Поле должно быть изображением',
            'preview_image.max' => 'Максимальный размер файла 2Мб',
            'main_image.image' => 'Поле должно быть изображением',
            'main_image.max' => 'Максимальный размер файла 2Мб',
            'category_id.required' => 'Поле обязательно для заполнения',
            'category_id.integer' => 'Поле должно быть числом',
            'category_id.exists' => 'Поле должно быть числом',
            'tag_ids.array' => 'Поле должно быть массивом',
            'tag_ids.*.integer' => 'Поле должно быть числом',
            'tag_ids.*.exists' => 'Тег не найден',
        ];
    }
}

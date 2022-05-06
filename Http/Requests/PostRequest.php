<?php

namespace Modules\Post\Http\Requests;

use App\Abstracts\FormRequest;
use Illuminate\Validation\Rule;
use Modules\Post\Entities\Category;

class PostRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'string'],
            'slug' => ['required', 'string', Rule::unique('posts', 'slug')->whereNull('deleted_at')->ignore($this->route('post'))],
            'category' => ['required', 'array'],
            'content' => ['required', 'string'],
        ];
    }

    public function getData(): array
    {
        $category = Category::firstOrCreate(
            ['id' => $this->category['value']],
            ['name' => $this->category['label']]
        );

        return array_merge($this->validated(), ['category_id' => $category->id]);
    }
}

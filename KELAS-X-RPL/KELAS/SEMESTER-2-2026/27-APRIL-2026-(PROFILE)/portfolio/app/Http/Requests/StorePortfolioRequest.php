<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StorePortfolioRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title'        => 'required|string|max:255',
            'slug'         => 'nullable|string|max:255|unique:portfolios,slug',
            'description'  => 'required|string',
            'thumbnail'    => 'nullable|string|max:500',
            'project_url'  => 'nullable|url|max:500',
            'github_url'   => 'nullable|url|max:500',
            'tech_stack'   => 'nullable|array',
            'tech_stack.*' => 'string|max:100',
            'category'     => 'nullable|string|max:50',
            'is_featured'  => 'nullable|boolean',
            'completed_at' => 'nullable|date',
            'sort_order'   => 'nullable|integer|min:0',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required'       => 'Judul portofolio wajib diisi.',
            'description.required' => 'Deskripsi portofolio wajib diisi.',
            'project_url.url'      => 'URL project harus berupa URL yang valid.',
            'github_url.url'       => 'URL GitHub harus berupa URL yang valid.',
        ];
    }

    protected function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Validasi gagal.',
            'errors'  => $validator->errors(),
        ], 422));
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateBlogRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $blogId = $this->route('blog');

        return [
            'title'        => 'sometimes|required|string|max:255',
            'slug'         => "sometimes|nullable|string|max:255|unique:blogs,slug,{$blogId}",
            'excerpt'      => 'sometimes|required|string|max:500',
            'body'         => 'sometimes|required|string',
            'thumbnail'    => 'nullable|string|max:500',
            'category'     => 'nullable|string|max:50',
            'tags'         => 'nullable|array',
            'tags.*'       => 'string|max:50',
            'status'       => 'nullable|in:draft,published',
            'published_at' => 'nullable|date',
            'read_time'    => 'nullable|integer|min:1',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required'   => 'Judul blog wajib diisi.',
            'excerpt.required' => 'Ringkasan blog wajib diisi.',
            'body.required'    => 'Konten blog wajib diisi.',
            'status.in'        => 'Status harus draft atau published.',
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

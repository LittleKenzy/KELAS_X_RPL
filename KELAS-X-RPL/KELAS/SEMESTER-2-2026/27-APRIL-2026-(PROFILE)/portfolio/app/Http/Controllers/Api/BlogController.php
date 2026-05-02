<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Blog;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of blogs.
     */
    public function index(Request $request): JsonResponse
    {
        $query = Blog::latest('published_at');

        // Only show published for public API (no auth)
        if (!$request->boolean('include_drafts')) {
            $query->published();
        }

        if ($request->filled('category')) {
            $query->byCategory($request->category);
        }

        $blogs = $request->boolean('paginate')
            ? $query->paginate($request->integer('per_page', 10))
            : $query->get();

        return response()->json([
            'success' => true,
            'data'    => $blogs,
            'message' => 'Data blog berhasil dimuat.',
        ]);
    }

    /**
     * Store a newly created blog.
     */
    public function store(StoreBlogRequest $request): JsonResponse
    {
        $data = $request->validated();

        // Auto-set published_at when status is published
        if (($data['status'] ?? null) === 'published' && empty($data['published_at'])) {
            $data['published_at'] = now();
        }

        // Auto-calculate read time (avg 200 words/minute)
        if (empty($data['read_time']) && !empty($data['body'])) {
            $data['read_time'] = max(1, (int) ceil(str_word_count(strip_tags($data['body'])) / 200));
        }

        $blog = Blog::create($data);

        return response()->json([
            'success' => true,
            'data'    => $blog,
            'message' => 'Blog berhasil ditambahkan.',
        ], 201);
    }

    /**
     * Display the specified blog.
     */
    public function show(Blog $blog): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data'    => $blog,
            'message' => 'Detail blog berhasil dimuat.',
        ]);
    }

    /**
     * Update the specified blog.
     */
    public function update(UpdateBlogRequest $request, Blog $blog): JsonResponse
    {
        $data = $request->validated();

        // Auto-set published_at if publishing for the first time
        if (($data['status'] ?? null) === 'published' && !$blog->published_at) {
            $data['published_at'] = now();
        }

        // Recalculate read time if body changed
        if (!empty($data['body'])) {
            $data['read_time'] = max(1, (int) ceil(str_word_count(strip_tags($data['body'])) / 200));
        }

        $blog->update($data);

        return response()->json([
            'success' => true,
            'data'    => $blog->fresh(),
            'message' => 'Blog berhasil diperbarui.',
        ]);
    }

    /**
     * Remove the specified blog.
     */
    public function destroy(Blog $blog): JsonResponse
    {
        $blog->delete();

        return response()->json([
            'success' => true,
            'data'    => null,
            'message' => 'Blog berhasil dihapus.',
        ]);
    }
}

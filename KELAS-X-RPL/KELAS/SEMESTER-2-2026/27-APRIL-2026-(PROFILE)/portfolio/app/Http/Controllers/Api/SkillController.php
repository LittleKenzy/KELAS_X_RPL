<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * Ambil semua skill, bisa difilter berdasarkan kategori.
     */
    public function index(Request $request): JsonResponse
    {
        $query = Skill::ordered();

        if ($request->has('category')) {
            $query->byCategory($request->category);
        }

        $skills = $query->get();

        return response()->json([
            'success' => true,
            'data'    => $skills,
            'message' => 'Data skill berhasil diambil.',
        ]);
    }
}

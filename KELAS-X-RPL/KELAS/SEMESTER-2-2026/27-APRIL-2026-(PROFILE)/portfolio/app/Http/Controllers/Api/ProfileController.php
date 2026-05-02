<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\JsonResponse;

class ProfileController extends Controller
{
    /**
     * Ambil data profil (hanya 1 baris pertama).
     */
    public function index(): JsonResponse
    {
        $profile = Profile::first();

        if (!$profile) {
            return response()->json([
                'success' => false,
                'data'    => null,
                'message' => 'Profil belum diatur.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data'    => $profile,
            'message' => 'Data profil berhasil diambil.',
        ]);
    }
}

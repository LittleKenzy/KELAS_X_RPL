<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePortfolioRequest;
use App\Http\Requests\UpdatePortfolioRequest;
use App\Models\Portfolio;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    /**
     * Display a listing of portfolios.
     */
    public function index(Request $request): JsonResponse
    {
        $query = Portfolio::ordered();

        // Optional filters
        if ($request->filled('category')) {
            $query->byCategory($request->category);
        }

        if ($request->boolean('featured')) {
            $query->featured();
        }

        $portfolios = $request->boolean('paginate')
            ? $query->paginate($request->integer('per_page', 12))
            : $query->get();

        return response()->json([
            'success' => true,
            'data'    => $portfolios,
            'message' => 'Data portofolio berhasil dimuat.',
        ]);
    }

    /**
     * Store a newly created portfolio.
     */
    public function store(StorePortfolioRequest $request): JsonResponse
    {
        $portfolio = Portfolio::create($request->validated());

        return response()->json([
            'success' => true,
            'data'    => $portfolio,
            'message' => 'Portofolio berhasil ditambahkan.',
        ], 201);
    }

    /**
     * Display the specified portfolio.
     */
    public function show(Portfolio $portfolio): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data'    => $portfolio,
            'message' => 'Detail portofolio berhasil dimuat.',
        ]);
    }

    /**
     * Update the specified portfolio.
     */
    public function update(UpdatePortfolioRequest $request, Portfolio $portfolio): JsonResponse
    {
        $portfolio->update($request->validated());

        return response()->json([
            'success' => true,
            'data'    => $portfolio->fresh(),
            'message' => 'Portofolio berhasil diperbarui.',
        ]);
    }

    /**
     * Remove the specified portfolio.
     */
    public function destroy(Portfolio $portfolio): JsonResponse
    {
        $portfolio->delete();

        return response()->json([
            'success' => true,
            'data'    => null,
            'message' => 'Portofolio berhasil dihapus.',
        ]);
    }
}

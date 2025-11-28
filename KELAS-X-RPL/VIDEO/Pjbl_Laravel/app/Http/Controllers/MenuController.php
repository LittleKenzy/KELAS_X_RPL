<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Menu;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategoris = Kategori::all();
        $menu = Menu::join('kategoris', 'menus.idkategori', '=', 'kategoris.idkategori')->select([
            'menus.*',
            'kategoris.*'
        ])->paginate(3);
        return view('Backend.menu.select', ['menus' => $menu, 'kategoris' => $kategoris]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMenuRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMenuRequest $request, Menu $menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        //
    }
    public function select(Request $request)
    {
        $id = $request->idkategori;
        $kategoris = Kategori::all();
        $menu = Menu::join('kategoris', 'menus.idkategori', '=', 'kategoris.idkategori')
            ->select([
                'menus.*',
                'kategoris.*'
            ])
            ->where('menus.idkategori', $id)
            ->paginate(1);
        return view('Backend.menu.select', ['menus' => $menu, 'kategoris' => $kategoris]);
    }
}

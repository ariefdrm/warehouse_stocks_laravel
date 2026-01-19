<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Items;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Items::with('category')
            ->latest()
            ->paginate(10);

        return view('items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view('items.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => ['required', 'exists:category,id'],
            'sku'        => ['required', 'string', 'max:150', 'unique:items,sku'],
            'unit'         => ['required', 'string', 'max:100'],
            'description' => ['nullable', 'string'],
        ]);

        Items::create($validated);

        return redirect()
            ->route('items.index')
            ->with('success', 'Item berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Items $item)
    {
        $item->load('category');

        return view('items.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Items $item)
    {
        $categories = Category::orderBy('name')->get();

        return view('items.edit', compact('item', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Items $item)
    {
        $validated = $request->validate([
            'category_id' => ['required', 'exists:category,id'],
            'sku'         => [
                'required',
                'string',
                'max:100',
                'unique:items,sku,' . $item->id,
            ],
            'unit'         => ['required', 'string', 'max:100'],
            'description' => ['nullable', 'string'],
        ]);

        $item->update($validated);

        return redirect()
            ->route('items.index')
            ->with('success', 'Item berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Items $item)
    {
        $item->delete();

        return redirect()
            ->route('items.index')
            ->with('success', 'Item berhasil dihapus.');
    }
}

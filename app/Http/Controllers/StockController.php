<?php

namespace App\Http\Controllers;

use App\Models\Items;
use App\Models\Stocks;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stocks = Stocks::with(['items', 'warehouse'])
            ->orderBy('warehouse_id')
            ->orderBy('items_id')
            ->paginate(15);

        return view('stocks.index', compact('stocks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $item = Items::orderBy('sku')->get();
        $warehouses = Warehouse::orderBy('name')->get();

        return view('stocks.create', compact('item', 'warehouses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'items_id' => ['required', 'exists:items,id'],
            'warehouse_id' => ['required', 'exists:warehouse,id'],
            'quantity' => ['required', 'integer', 'min:0'],
        ]);

        $exists = Stocks::where('items_id', $validated['items_id'])
            ->where('warehouse_id', $validated['warehouse_id'])
            ->exists();

        if ($exists) {
            return back()
                ->withErrors([
                    'items_id' => 'Stok untuk item dan warehouse ini sudah ada.',
                ])
                ->withInput();
        }

        Stocks::create($validated);

        return redirect()
            ->route('stocks.index')
            ->with('success', 'Stok berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stocks $stock)
    {
        $items = Items::orderBy('sku')->get();
        $warehouses = Warehouse::orderBy('name')->get();

        return view('stocks.edit', compact('stock', 'items', 'warehouses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stocks $stock)
    {
        $validated = $request->validate([
            'quantity' => ['required', 'integer', 'min:0'],
        ]);

        $stock->update($validated);

        return redirect()
            ->route('stocks.index')
            ->with('success', 'Stok berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stocks $stock)
    {
        if ($stock->quantity > 0) {
            return back()->withErrors([
                'quantity' => 'Stok tidak bisa dihapus jika masih ada quantity.',
            ]);
        }

        $stock->delete();

        return redirect()
            ->route('stocks.index')
            ->with('success', 'Stok berhasil dihapus.');
    }
}

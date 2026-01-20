<?php

namespace App\Http\Controllers;

use App\Models\Items;
use App\Models\Stocks;
use App\Models\StocksTransaction;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StockTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = StocksTransaction::with(['items', 'warehouse', 'users'])
            ->latest()
            ->paginate(15);

        return view('stock_transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $items = Items::orderBy('sku')->get();
        $warehouses = Warehouse::orderBy('name')->get();

        return view('stock_transactions.create', compact('items', 'warehouses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'items_id'      => ['required', 'exists:items,id'],
            'warehouse_id' => ['required', 'exists:warehouse,id'],
            'type'         => ['required', 'in:IN,OUT'],
            'quantity'     => ['required', 'integer', 'min:1'],
            'note'         => ['nullable', 'string'],
        ]);

        DB::transaction(function () use ($validated) {

            $stock = Stocks::where('items_id', $validated['items_id'])
                ->where('warehouse_id', $validated['warehouse_id'])
                ->lockForUpdate()
                ->first();

            if (!$stock) {
                return back()->with('error', 'Maaf, Stok belum tersedia untuk item dan warehouse ini.');
            }

            if (
                $validated['type'] === 'OUT' &&
                $stock->quantity < $validated['quantity']
            ) {
                return  back()->with('error', 'Maaf, Anda tidak memiliki akses untuk transaksi stok ini.');
            }

            // Update stock
            if ($validated['type'] === 'IN') {
                $stock->increment('quantity', $validated['quantity']);
            } else {
                $stock->decrement('quantity', $validated['quantity']);
            }

            // Save transaction
            StocksTransaction::create([
                'items_id'      => $validated['items_id'],
                'warehouse_id' => $validated['warehouse_id'],
                'users_id'      => Auth::id(),
                'type'         => $validated['type'],
                'quantity'     => $validated['quantity'],
                'note'         => $validated['note'] ?? null,
            ]);
        });

        return redirect()
            ->route('stock-transactions.index')
            ->with('success', 'Transaksi stok berhasil disimpan.');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

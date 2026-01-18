<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Items;
use App\Models\Stocks;
use App\Models\StocksTransaction;
use App\Models\Warehouse;

class DashboardController extends Controller
{
    public function index()
    {
        $totalCategories = Category::count();
        $totalItems      = Items::count();
        $totalWarehouses = Warehouse::count();
        $totalStock      = Stocks::sum('quantity');

        $recentTransactions = StocksTransaction::with(['items', 'warehouse', 'users'])
            ->latest()
            ->limit(5)
            ->get();

        $lowStocks = Stocks::with(['items', 'warehouse'])
            ->where('quantity', '<', 10)
            ->orderBy('quantity')
            ->limit(5)
            ->get();

        return view('dashboard', compact(
            'totalCategories',
            'totalItems',
            'totalWarehouses',
            'totalStock',
            'recentTransactions',
            'lowStocks'
        ));
    }
}

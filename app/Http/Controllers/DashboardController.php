<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Items;
use App\Models\Stocks;
use App\Models\StocksTransaction;
use App\Models\User;
use App\Models\Warehouse;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        /* =====================
         | BASE DATA (ALL ROLES)
         |===================== */
        $data = [
            'recentTransactions' => StocksTransaction::with(['items', 'warehouse', 'users'])
                ->latest()
                ->limit(5)
                ->get(),
        ];

        /* =====================
         | ADMIN + OWNER
         |===================== */
        if ($user->hasRole('admin') || $user->isOwner()) {
            $data['totalCategories'] = Category::count();
            $data['totalItems']      = Items::count();
            $data['totalWarehouses'] = Warehouse::count();
            $data['totalStock']      = Stocks::sum('quantity');

            $data['lowStocks'] = Stocks::with(['items', 'warehouse'])
                ->where('quantity', '<', 10)
                ->orderBy('quantity')
                ->limit(5)
                ->get();
        }

        /* =====================
         | OWNER ONLY
         |===================== */
        if ($user->isOwner()) {
            $data['totalUsers'] = User::count();
        }

        /* =====================
         | SUPERVISOR
         |===================== */
        if ($user->hasRole('supervisor')) {
            $data['totalItems'] = Items::count();
            $data['totalStock'] = Stocks::sum('quantity');
        }

        /* =====================
         | STAFF
         |===================== */
        if ($user->hasRole('staff')) {
            $data['recentTransactions'] = StocksTransaction::with(['items', 'warehouse'])
                ->where('users_id', $user->id)
                ->latest()
                ->limit(5)
                ->get();
        }

        return view('dashboard', $data);
    }
}

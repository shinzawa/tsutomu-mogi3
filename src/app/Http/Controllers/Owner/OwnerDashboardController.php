<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OwnerDashboardController extends Controller
{
    public function menu()
    {
        return view('owner.menu');
    }
    
    public function index()
    {
        $shop = Auth::user()->shop;

        $todayCount = $shop->reservations()
            ->whereDate('date', today())
            ->count();

        $weekCount = $shop->reservations()
            ->whereBetween('date', [now()->startOfWeek(), now()->endOfWeek()])
            ->count();

        return view('owner.dashboard', compact('shop', 'todayCount', 'weekCount'));
    }
}

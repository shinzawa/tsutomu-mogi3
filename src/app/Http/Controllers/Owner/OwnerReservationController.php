<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OwnerReservationController extends Controller
{
    public function index()
    {
        $shop = Auth::user()->shop;

        $reservations = $shop->reservations()->with('user')->get();

        return view('owner.reservations.index', compact('reservations'));
    }
}

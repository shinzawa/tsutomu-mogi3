<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use Illuminate\Http\Request;
use App\Services\AddressService;

class AdminShopController extends Controller
{
    public function index()
    {
        $shops = Shop::all();
        return view('admin.shops.index', compact('shops'));
    }
}

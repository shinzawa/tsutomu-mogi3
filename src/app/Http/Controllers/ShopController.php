<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;

class ShopController extends Controller
{
    public function show($shop_id = null)
    {
        if ($shop_id) {
            // ショップの詳細を表示するロジック
            $shop = Shop::find($shop_id);
            return view('shop.detail', ['shop' => $shop]);
        } else {
            // ショップの一覧を表示するロジック
            $shops = Shop::all();
            return view('shop.index', ['shops' => $shops]);
        }
    }
}

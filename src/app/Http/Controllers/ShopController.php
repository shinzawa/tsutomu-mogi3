<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Reserve;

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
            if (auth()->check()) {
                $favoriteShopIds = auth()->user()->likes()->pluck('shop_id')->toArray();
            } else {
                $favoriteShopIds = [];
            }
            return view('shop.index', ['shops' => $shops, 'favoriteShopIds' => $favoriteShopIds]);
        }
    }

    public function mypage()
    {
        $query = Shop::query();
        $query->whereIn('id', function ($query) {
            $query->select('shop_id')
            ->from('likes')
            ->where('user_id', auth()->id());
        });
        $shops = $query->get();
        $favoriteShopIds = $shops->pluck('id')->toArray();

        $reservations = Reserve::with('shop')
                 ->where('user_id', auth()->id())
                 ->get();
        $user = auth()->user();
        return view('shop.mypage', compact(['user', 'shops', 'reservations', 'favoriteShopIds']));
    }
}

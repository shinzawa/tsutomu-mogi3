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

    public function reservation(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'time' => 'required',
            'number_of_people' => 'required|integer|min:1',
        ]);

        $reserve = new Reserve();
        $reserve->user_id = auth()->id();
        $reserve->shop_id = $request->input('shop_id');
        $reserve->date = $request->input('date');
        $reserve->time = $request->input('time');
        $reserve->number_of_people = $request->input('number_of_people');
        $reserve->save();

        return redirect()->route('shop.done');
    }
}

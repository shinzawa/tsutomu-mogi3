<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Reserve;
use App\Http\Requests\ReservationRequest;

class ShopController extends Controller
{
    public function show($shop_id = null)
    {
        // ① 詳細ページの場合
        if ($shop_id) {
            $shop = Shop::find($shop_id);
            return view('shop.detail', ['shop' => $shop]);
        }

        // ② 一覧ページ（検索対応）
        $query = Shop::query();

        // area
        $area = request('area');

        $areaMap = [
            '関東' => ['東京都'],
            '近畿' => ['大阪府'],
            '九州・沖縄' => ['福岡県'],
        ];

        if ($area && isset($areaMap[$area])) {
            $query->whereIn('area', $areaMap[$area]);
        }

        // genre
        if (request('genre')) {
            $query->where('genre', request('genre'));
        }

        // search（店名・説明文などに部分一致）
        if (request('search')) {
            $search = request('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('description', 'LIKE', "%{$search}%");
            });
        }

        // 結果取得
        $shops = $query->get();

        // ログイン時はお気に入り取得
        $favoriteShopIds = auth()->check()
            ? auth()->user()->likes()->pluck('shop_id')->toArray()
            : [];

        return view('shop.index', [
            'shops' => $shops,
            'favoriteShopIds' => $favoriteShopIds
        ]);
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

    public function reservation(ReservationRequest $request)
    {
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

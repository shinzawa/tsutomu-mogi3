<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;


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
            '北海道' => ['北海道'],
            '東北' => ['青森県', '岩手県', '宮城県', '秋田県', '山形県', '福島県'],
            '関東' => ['東京都', '神奈川県', '埼玉県', '千葉県', '茨城県', '栃木県', '群馬県'],
            '中部' => ['新潟県', '富山県', '石川県', '福井県', '山梨県', '長野県', '岐阜県', '静岡県', '愛知県'],
            '近畿' => ['大阪府', '京都府', '兵庫県', '滋賀県', '奈良県', '和歌山県'],
            '中国' => ['鳥取県', '島根県', '岡山県', '広島県', '山口県'],
            '四国' => ['徳島県', '香川県', '愛媛県', '高知県'],
            '九州・沖縄' => ['福岡県', '佐賀県', '長崎県', '熊本県', '大分県', '宮崎県', '鹿児島県', '沖縄県'],
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
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;

class LikeController extends Controller
{
    public function toggle(Request $request)
    {
        $userId = auth()->id();
        $shopId = $request->input('shop_id');
        
        $like = Like::where('user_id', $userId)
            ->where('shop_id', $shopId)
            ->first();

        if ($like) {
            $like->delete();
        } else {
            Like::create([
                'user_id' => $userId,
                'shop_id' => $shopId,
            ]);
        }

        return back(); // 元のページに戻る
    }
}

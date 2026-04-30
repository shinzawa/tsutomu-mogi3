<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        $user = auth()->user();

        // 管理者なら admin menu へ
        if ($user->role === 'admin') {
            return redirect()->route('admin.menu');
        }

        // 店舗代表者なら owner menu へ
        if ($user->role === 'owner') {
            return redirect()->route('owner.menu');
        }

        // それ以外は通常のユーザー用
        return redirect()->route('shop.index');
    }
}

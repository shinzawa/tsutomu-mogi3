<?php

namespace App\Actions\Fortify;

use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class AuthenticateUser
{
    public function __invoke($request)
    {
        if (! Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'email' => 'ログイン情報が登録されていません。',
            ]);
        }

        return Auth::user();
    }
}

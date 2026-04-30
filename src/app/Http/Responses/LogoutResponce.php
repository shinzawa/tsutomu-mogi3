<?php

// app/Http/Responses/LogoutResponse.php

namespace App\Http\Responses;

use Illuminate\Http\JsonResponse;
use Laravel\Fortify\Contracts\LogoutResponse as LogoutResponseContract;

class LogoutResponse implements LogoutResponseContract
{
    public function toResponse($request)
    {
        return redirect('/menu2'); // ここで menu2 に飛ばす
    }
}

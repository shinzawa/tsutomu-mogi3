<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Like extends Model
{
    use HasFactory;

    protected $table = 'likes';

    protected $primaryKey = ['user_id', 'shop_id'];

    public $incrementing = false;

    protected $fillable = [
        'user_id',
        'shop_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function shop()
    {
        return $this->belongsTo('App\Models\Shop');
    }

    public function liked($shop_id)
    {
        $count = Like::where('shop_id', $shop_id)->where('user_id', Auth::id())->count();
        return $count > 0;
    }
}

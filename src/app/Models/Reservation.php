<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $table = 'reservations';

    protected $fillable = [
        'user_id',
        'shop_id',
        'date',
        'time',
        'number_of_people',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function shop()
    {
        return $this->belongsTo('App\Models\Shop');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($reservation) {
            $reservation->checkin_token = (string) \Illuminate\Support\Str::uuid();
        });
    }
}

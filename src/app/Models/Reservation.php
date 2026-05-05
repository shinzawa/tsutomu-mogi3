<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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
        'checkin_token',
        'checked_in_at',
        'payment_status',
        'payment_intent_id',
        'price_at_booking',
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
            $reservation->checkin_token = (string) Str::uuid();
        });
    }

    public function review()
    {
        return $this->hasOne(Review::class);
    }
}

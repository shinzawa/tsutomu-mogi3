<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $table = 'shops';

    protected $fillable = [
        'name',
        'area',
        'genre',
        'description',
        'img_url',
        'shop_owner_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function likes()
    {
        return $this->hasMany('App\Models\Like');
    }

    public function reserves()
    {
        return $this->hasMany('App\Models\Reserve');
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'shop_owner_id');
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}

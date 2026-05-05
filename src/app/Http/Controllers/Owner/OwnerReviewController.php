<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class OwnerReviewController extends Controller
{
    public function index()
    {
        $shopId = Auth::user()->shop->id;

        $reviews = Review::with('user', 'reservation')
            ->where('shop_id', $shopId)
            ->latest()
            ->get();

        return view('owner.reviews.index', compact('reviews'));
    }
}

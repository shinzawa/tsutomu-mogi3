<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use Illuminate\Http\Request;
use App\Http\Requests\ShopValidationRequest;
use Illuminate\Support\Facades\Auth;
use App\Services\AddressService;

class OwnerShopController extends Controller
{
    private $addressService;

    public function __construct(AddressService $addressService)
    {
        $this->addressService = $addressService;
    }

    public function edit()
    {
        $shop = Auth::user()->shop;
        return view('owner.shop.edit', compact('shop'));
    }

    public function create()
    {
        return view('owner.shop.create');
    }

    public function store(ShopValidationRequest $request)
    {
        // store image file to defined place
        $image = $request->file('image');
        if (isset($image)) {
            $path = $image->store('shops', 'public');
        }
        $address = $request->address;
        $genre = $request->genre;
        $img_url = $path;
        $description = $request->description;
        $area = $this->addressService->addressToArea($address);

        Shop::create([
            'name' => $request->name,
            'address' => $address,
            'genre' => $genre,
            'area' => $area,
            'img_url' => $img_url,
            'description' => $description,
            'shop_owner_id' => Auth::id(),
        ]);

        return redirect()->route('owner.dashboard')
            ->with('success', '店舗を登録しました');
    }

    public function update(ShopValidationRequest $request)
    {
        $shop = Auth::user()->shop;

        $this->authorize('update', $shop);

        $data = $request->validated();

        // 住所 → 地方（area）を自動判定
        if (isset($data['address'])) {
            $data['area'] = $this->addressService->addressToArea($data['address']);
        }

        if ($request->hasFile('image')) {
            $data['img_url'] = $request->file('image')->store('shops', 'public');
        }

        $shop->update($data);

        return back()->with('success', '店舗情報を更新しました');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminOwnerController extends Controller
{
    public function menu()
    {
        return view('admin.menu');
    }
    
    public function index()
    {
        $owners = User::where('role', 'owner')->with('shop')->get();
        return view('admin.owners.index', compact('owners'));
    }

    public function create()
    {
        return view('admin.owners.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'email_verified_at' => now(),
            'role' => 'owner',
        ]);

        return redirect()->route('admin.owners.index')
            ->with('success', '店舗代表者を作成しました');
    }
}

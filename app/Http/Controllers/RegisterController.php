<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(RegisterRequest $request)
    {
        $attributes = $request->all();
        $attributes['password'] = bcrypt($request->password);
        $attributes['access_level'] = 'user';
        User::create($attributes);

        return redirect(route('login'))->with('success', 'Thank you, you are now registered.');
    }
}

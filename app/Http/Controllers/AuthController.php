<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register() {
        return view("auth.register");
    }

    public function login() {
        return view("auth.login");
    }

    public function store(Request $request) {
        $fields = $request -> validate([
            "name" => ["min:3", "required", "max:255"],
            "email" => ["required", "email", "unique:users", "max:255"],
            "password" => ["required", "min:8", "confirmed"]
        ]);

        $user = User::create($fields);
        Auth::login($user, true);

        return redirect() -> intended(route("cars.index"));
    }

    public function authenticate(Request $request) {
        $fields = $request -> validate([
            "email" => ["required", "email"],
            "password" => "required"
        ]);

        if (Auth::attempt($fields)) {
            return redirect() -> intended(route("cars.index"));
        } else {
            return back() -> withErrors(["failed" => "Invalid credentials."]);
        }
    }

    public function destroy(Request $request) {
        Auth::logout();
        $request -> session() -> invalidate();
        $request -> session() -> regenerateToken();

        return redirect(route("cars.index"));
    }
}

<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

Route::middleware("guest") -> controller(AuthController::class) -> group(function() {
    Route::get("/register", "register") -> name("auth.register");
    Route::get("/login", "login") -> name("login");
    Route::post("/register", "store") -> name("user.signup");
    Route::post("/login", "authenticate") -> name("user.authenticate");
});

Route::middleware("auth") -> group(function() {
    Route::delete("/logout", [AuthController::class, "destroy"]) -> name("user.logout");
    Route::post("/cars/{car}", [CommentController::class, "store"]) -> name("comment.store");
});

Route::resource("cars", CarController::class);
Route::view('/', "about") -> name("home");
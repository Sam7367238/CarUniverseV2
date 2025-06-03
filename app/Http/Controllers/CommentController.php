<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, Car $car) {
        $fields = $request -> validate([
            "comment" => ["required", "max:255"],
            "rating" => ["required", "integer", "min:1", "max:5"]
        ]);

        $fields["user_id"] = Auth::user() -> id;

        $car -> comments() -> create($fields);

        return back();
    }
}

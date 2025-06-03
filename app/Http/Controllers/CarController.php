<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller implements HasMiddleware
{
    /**
     * Get the middleware for the controller.
     *
     * @return array
     */
    public static function middleware(): array
    {
        return [
            new Middleware("auth", except: ["index", "show"])
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::latest() -> paginate(6);
        return view("home", ["cars" => $cars]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("newcar");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request -> validate([
            "name" => ["required", "max:255"],
            "carphoto" => ["required", "file", "max:1024", "mimes:png,jpg"]
        ]);

        $path = Storage::disk("public") -> put("car_images", $request -> carphoto);

        Auth::user() -> cars() -> create([
            "name" => $request -> name,
            "image" => $path
        ]);

        return redirect() -> route("cars.index") -> with("success", "Car Posted Successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        return view("car", ["car" => $car]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        Gate::authorize("delete", $car);

        $car -> delete();

        return back() -> with("success", "Car Deleted Successfully");
    }
}

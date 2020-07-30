<?php

namespace App\Http\Controllers;

use App\Http\Requests\ColorRequest;
use App\Color;

class ColorController extends Controller
{
    public function index()
    {
        $colors = Color::latest()->get();

        return response(['data' => $colors ], 200);
    }

    public function store(ColorRequest $request)
    {
        $color = Color::create($request->all());

        return response(['data' => $color ], 201);

    }

    public function show($id)
    {
        $color = Color::findOrFail($id);

        return response(['data', $color ], 200);
    }

    public function update(ColorRequest $request, $id)
    {
        $color = Color::findOrFail($id);
        $color->update($request->all());

        return response(['data' => $color ], 200);
    }

    public function destroy($id)
    {
        Color::destroy($id);

        return response(['data' => null ], 204);
    }
}

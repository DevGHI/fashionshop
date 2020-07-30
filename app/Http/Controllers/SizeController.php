<?php

namespace App\Http\Controllers;

use App\Http\Requests\SizeRequest;
use App\Size;

class SizeController extends Controller
{
    public function index()
    {
        $sizes = Size::latest()->get();

        return response(['data' => $sizes ], 200);
    }

    public function store(SizeRequest $request)
    {
        $size = Size::create($request->all());

        return response(['data' => $size ], 201);

    }

    public function show($id)
    {
        $size = Size::findOrFail($id);

        return response(['data', $size ], 200);
    }

    public function update(SizeRequest $request, $id)
    {
        $size = Size::findOrFail($id);
        $size->update($request->all());

        return response(['data' => $size ], 200);
    }

    public function destroy($id)
    {
        Size::destroy($id);

        return response(['data' => null ], 204);
    }
}

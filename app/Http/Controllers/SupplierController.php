<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupplierRequest;
use App\Supplier;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::latest()->get();

        return response(['data' => $suppliers ], 200);
    }

    public function store(SupplierRequest $request)
    {
        $supplier = Supplier::create($request->all());

        return response(['data' => $supplier ], 201);

    }

    public function show($id)
    {
        $supplier = Supplier::findOrFail($id);

        return response(['data', $supplier ], 200);
    }

    public function update(SupplierRequest $request, $id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->update($request->all());

        return response(['data' => $supplier ], 200);
    }

    public function destroy($id)
    {
        Supplier::destroy($id);

        return response(['data' => null ], 204);
    }
}

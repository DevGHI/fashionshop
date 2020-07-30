<?php

namespace App\Http\Controllers;

use App\Http\Requests\TownshipRequest;
use App\Township;

class TownshipController extends Controller
{
    public function index()
    {
        $townships = Township::latest()->get();

        return response(['data' => $townships ], 200);
    }

    public function store(TownshipRequest $request)
    {
        $township = Township::create($request->all());

        return response(['data' => $township ], 201);

    }

    public function show($id)
    {
        $township = Township::findOrFail($id);

        return response(['data', $township ], 200);
    }

    public function update(TownshipRequest $request, $id)
    {
        $township = Township::findOrFail($id);
        $township->update($request->all());

        return response(['data' => $township ], 200);
    }

    public function destroy($id)
    {
        $res=Township::destroy($id);
        $res==1?$msg='success':$msg='fail';

        //return response(['status' => 'success' ], 204);
        return [
            'status'=>$msg
        ];
    }
}

<?php

namespace App\Http\Controllers;
use App\Models\Tovar;
use Response;

use Illuminate\Http\Request;

class TovarController extends Controller
{

    public function getAll(Request $request)
    {
        $tovars = Tovar::all();

        return Response::json([
            'data' => $tovars
        ], 201);
    }

    public function getById(Request $request)
    {
        $tovar_id = $request->route('tovarId');
        $tovar = Tovar::where('id', $tovar_id)->first();

        return Response::json([
            'data' => $tovar
        ], 201);
    }

    public function create(Request $request)
    {   
        $fields = $request->all();

        $tovar = Tovar::create([
            'name' => $fields['name'],
            'desc' => $fields['desc'],
            'category' => $fields['category'],
            'price' => $fields['price'],
        ]);

        return Response::json([
            'data' => $tovar
        ], 201);
    }

    public function delete(Request $request)
    {   
        $tovar_id = $request->route('tovarId');
        $deleted = Tovar::where('id', $tovar_id)->delete();

        return Response::json([
            'data' => 'succes'
        ], 201);
    }

    public function update(Request $request)
    {   
        $tovar_id = $request->route('tovarId');

        $tovar = Tovar::where('id', $tovar_id)->update($request->all());
        $newTovar = Tovar::find($tovar_id);

        return Response::json([
            'updated' => $newTovar
        ], 201);
    }
}

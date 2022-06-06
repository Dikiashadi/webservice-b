<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CategorieController extends Controller
{
    public function index()
    {
        $data = categorie::all();
        return response()->json($data, 200);
    }
    public function show($id)
    {
        $data = categorie::where('id', $id)->first();
        if (!empty($data)) {
            return $data;
        }
        return response()->json(['message' => 'data tidak ditemukan'], 404);
    }
    public function destroy($id)
    {
        $data = categorie::where('id', $id)->first();
        if (empty($data)) {
            return response()->json(['message' => 'data tidak ditemukan'], 404);
        }
        return response()->json([
            'message' => 'data berhasil dihapus'
        ], 200);
    }
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required'
        ]);
        if ($validate->passes()) {
            return categorie::create($request->all());
            return response()->json(['message' => 'data berhasil disimpan']);
        }
        return response()->json([
            'message' => 'data gagal disimpan',
            'status' => $validate->errors()->all()
        ]);
    }
}
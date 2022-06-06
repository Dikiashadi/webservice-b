<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ProductController extends Controller
{
    public function index()
    {
        $data = Product::all();
        return response()->json($data, 200);
    }
    public function show($id)
    {
        $data = Product::where('id', $id)->first();
        if (!empty($data)) {
            return $data;
        }
        return response()->json(['message' => 'data tidak ditemukan'], 404);
    }
    public function destroy($id)
    {
        $data = Product::where('id', $id)->first();
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
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category_id' => 'required'
        ]);
        if ($validate->passes()) {
            return product::create($request->all());
            return response()->json(['message' => 'data berhasil disimpan']);
        }
        return response()->json([
            'message' => 'data gagal disimpan',
            'status' => $validate->errors()->all()
        ]);
    }
}
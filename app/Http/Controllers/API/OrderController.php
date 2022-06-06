<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class OrderController extends Controller
{
    public function index()
    {
        $data = order::all();
        return response()->json($data, 200);
    }
    public function show($id)
    {
        $data = order::where('id', $id)->first();
        if (!empty($data)) {
            return $data;
        }
        return response()->json(['message' => 'data tidak ditemukan'], 404);
    }
    public function destroy($id)
    {
        $data = order::where('id', $id)->first();
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
            'customer_id' => 'required',
            'product_id' => 'required',
            'status' => 'required'
        ]);
        if ($validate->passes()) {
            return order::create($request->all());
            return response()->json(['message' => 'data berhasil disimpan']);
        }
        return response()->json([
            'message' => 'data gagal disimpan',
            'status' => $validate->errors()->all()
        ]);
    }
}
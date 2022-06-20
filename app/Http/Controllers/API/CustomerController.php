<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Validator;


class CustomerController extends Controller
{
    public function index(){
        $data = Customer::all();
        return response()->json($data, 200);
    }

    public function show($id)
    {
        $data = Customer::where('id', $id)->first();
        if (!empty($data)) {
            return $data;
        }
        return response()->json(['message' => 'data tidak ditemukan'], 404);
    }
    public function destroy($id)
    {
        $data = Customer::where('id', $id)->first();
        // if (empty($data)) {
        //     return response()->json(['message' => 'data tidak ditemukan'], 404);
        // }
        // return response()->json([
        //     'message' => 'data berhasil dihapus'
        // ], 200);

        if ($data->delete()) {

        return response()->json(['message' => 'data berhasil dihapus'], 200);
        }
        return response()->json(['message' => 'data tidak ditemukan'], 404);

    }
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required'
        ]);
        if ($validate->passes()) {
            return Customer::create($request->all());
            return response()->json(['message' => 'data berhasil disimpan']);
        }
        return response()->json([
            'message' => 'data gagal disimpan',
            'status' => $validate->errors()->all()
        ]);
    }
    public function update(Request $request)
    {
        //validate data
        $validator = Validator::make($request->all(), [
            'name'     => 'required',
            'phone'   => 'required',
            'email'   => 'required',
            'address'   => 'required'
            
        ],
            [
                'name.required' => 'Masukkan Nama !',
                'phone.required' => 'Masukkan NO. HP !',
                'email.required' => 'Masukkan Email !',
                'address.required' => 'Masukkan Alamat !'
            ]
        );

        if($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ],401);

        } else {

            $post = Customer::whereId($request->input('id'))->update([
                'title'     => $request->input('title'),
                'content'   => $request->input('content'),
            ]);

            if ($post) {
                return response()->json([
                    'success' => true,
                    'message' => 'Post Berhasil Diupdate!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Post Gagal Diupdate!',
                ], 401);
            }

        }

    }
}
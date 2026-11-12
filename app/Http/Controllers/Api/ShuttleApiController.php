<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Shuttle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ShuttleApiController extends Controller
{
    public function index()
    {
        $data = Shuttle::all();

        return response()->json([
            'message' => 'Berhasil mengambil semua data',
            'data'    => $data
        ], 200);
    }

    public function show($id)
    {
        $data = Shuttle::find($id);

        if (!$data) {
            return response()->json([
                'message' => 'Data tidak ditemukan',
                'data'    => null
            ], 404);
        }

        return response()->json([
            'message' => 'Detail data ditemukan',
            'data'    => $data
        ], 200);
    }

    public function store(Request $request)
    {
        if ($request->bearerToken() !== 'TOKEN-RAHASIA-123') {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $validator = Validator::make($request->all(), [
            'nama_armada'      => 'required|string|max:255',
            'kapasitas'        => 'required|integer|min:1',
            'rute_operasional' => 'required|string|max:255',
            'status_aktif'     => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validasi gagal',
                'errors'  => $validator->errors()
            ], 422);
        }

        $shuttle = Shuttle::create($validator->validated());

        return response()->json([
            'message' => 'Data berhasil ditambahkan',
            'data'    => $shuttle
        ], 201);
    }

    public function update(Request $request, $id)
    {
        if ($request->bearerToken() !== 'TOKEN-RAHASIA-123') {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $shuttle = Shuttle::find($id);

        if (!$shuttle) {
            return response()->json([
                'message' => 'Data tidak ditemukan',
                'data'    => null
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'nama_armada'      => 'required|string|max:255',
            'kapasitas'        => 'required|integer|min:1',
            'rute_operasional' => 'required|string|max:255',
            'status_aktif'     => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validasi gagal',
                'errors'  => $validator->errors()
            ], 422);
        }

        $shuttle->update($validator->validated());

        return response()->json([
            'message' => 'Data berhasil diperbarui',
            'data'    => $shuttle
        ], 200);
    }
}
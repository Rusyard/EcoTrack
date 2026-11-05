<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
<<<<<<< HEAD
=======
use Illuminate\Http\Request;
>>>>>>> cfe9dc65b0322ecc48d1fde2aabb33cc07e2fbb5
use App\Models\Shuttle;

class ShuttleApiController extends Controller
{
    /**
     * Menampilkan seluruh data (Get All)
     */
    public function index()
    {
        $data = Shuttle::all();
<<<<<<< HEAD

        return response()->json([
            'message' => 'Berhasil mengambil semua data',
            'data'    => $data
=======
        
        return response()->json([
            'message' => 'Berhasil mengambil semua data',
            'data' => $data
>>>>>>> cfe9dc65b0322ecc48d1fde2aabb33cc07e2fbb5
        ], 200);
    }

    /**
     * Menampilkan data spesifik berdasarkan ID (Get By ID)
     */
    public function show($id)
    {
        $data = Shuttle::find($id);

        // Validasi jika data tidak ditemukan (Status 404)
        if (!$data) {
            return response()->json([
                'message' => 'Data tidak ditemukan',
<<<<<<< HEAD
                'data'    => null
=======
                'data' => null
>>>>>>> cfe9dc65b0322ecc48d1fde2aabb33cc07e2fbb5
            ], 404);
        }

        return response()->json([
            'message' => 'Detail data ditemukan',
<<<<<<< HEAD
            'data'    => $data
        ], 200);
    }
}
=======
            'data' => $data
        ], 200);
    }
}
>>>>>>> cfe9dc65b0322ecc48d1fde2aabb33cc07e2fbb5

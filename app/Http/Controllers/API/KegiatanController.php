<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\KegiatanResource;
use App\Models\KategoriKegiatan;
use Symfony\Component\HttpFoundation\Response;

class KegiatanController extends Controller
{
    public function index()
    {
        $kegiatan = KegiatanResource::collection(
            KategoriKegiatan::where('nama', 'like', '%' . request('keyword') . "%")->paginate(5)
        );
        $response = [
            'message' => "All Data Kegiatan",
            'data' => $kegiatan,
        ];
        return response()->json($response, Response::HTTP_OK);
    }

    public function show($id)
    {
        $kategori = KategoriKegiatan::findOrFail($id);
        $response = [
            'message' => "Kegiatan with id " . $id,
            'data' => $kategori,
        ];
        return response()->json($response, Response::HTTP_OK);
    }
}

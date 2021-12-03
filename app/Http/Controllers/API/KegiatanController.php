<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\KategoriKegiatan;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class KegiatanController extends Controller
{
    public function index()
    {
        $kegiatan = KategoriKegiatan::all();
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

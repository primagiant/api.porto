<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\JenisKegiatan;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class KegiatanController extends Controller
{
    public function index()
    {
        $jenis_kegiatan = JenisKegiatan::all();
        $response = [
            'message' => "All Data Kegiatan",
            'data' => $jenis_kegiatan,
        ];
        return response()->json($response, Response::HTTP_OK);
    }

    public function show($id)
    {
        $jenis_kegiatan = JenisKegiatan::findOrFail($id);
        $response = [
            'message' => "Kegiatan with id " . $id,
            'data' => $jenis_kegiatan,
        ];
        return response()->json($response, Response::HTTP_OK);
    }
}

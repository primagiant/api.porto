<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class ProdiController extends Controller
{
    public function index()
    {
        $prodi = Prodi::all();
        $response = [
            'message' => "All Data Prodi",
            'data' => $prodi,
        ];
        return response()->json($response, Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_prodi' => 'required|string|max:191',
            'deskripsi' => 'required|string|max:191',
            'fakultas_id' => 'required|numeric',
            'jurusan_id' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $prodi =  Prodi::create($request->all());
            $response = [
                'message' => "Prodi Data created",
                'data' => $prodi,
            ];
            return response()->json($response, Response::HTTP_CREATED);
        } catch (QueryException $e) {
            return response()->json([
                'message' => "Failed " . $e->errorInfo,
            ]);
        }
    }

    public function show($id)
    {
        $prodi = Prodi::findOrFail($id);
        $response = [
            'message' => "Prodi with id " . $id,
            'data' => $prodi,
        ];
        return response()->json($response, Response::HTTP_OK);
    }

    public function update(Request $request, $id)
    {
        $prodi = Prodi::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'nama_prodi' => 'required|string|max:191',
            'deskripsi' => 'required|string|max:191',
            'fakultas_id' => 'required|numeric',
            'jurusan_id' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $prodi->update($request->all());
            $response = [
                'message' => "Prodi Updated",
                'data' => $prodi,
            ];
            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json([
                'message' => "Failed " . $e->errorInfo,
            ]);
        }
    }

    public function destroy($id)
    {
        $prodi = Prodi::findOrFail($id);
        try {
            $prodi->delete();
            $response = [
                'message' => "Prodi Deleted",
            ];
            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json([
                'message' => "Failed " . $e->errorInfo,
            ]);
        }
    }
}

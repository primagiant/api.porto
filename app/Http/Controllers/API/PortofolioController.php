<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PortofolioResource;
use App\Models\Mahasiswa;
use App\Models\Portofolio;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class PortofolioController extends Controller
{
    public function index()
    {
        $mhs_id = User::findOrFail(Auth::user()->id)->mahasiswa->id;
        return PortofolioResource::collection(
            Mahasiswa::find($mhs_id)->portofolio()->paginate(5)
        );
    }

    public function store(Request $request)
    {
        ddd($request);
        $validator = Validator::make($request->all(), [
            'kategori_kegiatan_id' => ['required'],
            'jenis_kegiatan_id' => ['required'],
            'nama_kegiatan' => ['required', 'string', 'max:191'],
            'penyelenggara' => ['required', 'string', 'max:191'],
            'tahun' => ['required', 'digits_between:4,4', 'numeric'],
            'bukti' => ['file', 'mimes:jpg,png,jpeg,pdf', 'max:2048']
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $portofolio = Portofolio::create([
                'mahasiswa_id' => User::find(Auth::user()->id)->mahasiswa->id,
                'kategori_kegiatan_id' => $request->kategori_kegiatan,
                'jenis_kegiatan_id' => $request->jenis_kegiatan,
                'nama_kegiatan' => $request->nama_kegiatan,
                'penyelenggara' => $request->penyelenggara,
                'tahun' => $request->tahun,
                'bukti' => $request->file('bukti')->store('bukti'),
                'valid_point' => '0',
            ]);

            $result = new PortofolioResource(
                Portofolio::findOrFail($portofolio->id)
            );

            $response = [
                'message' => "Mahasiswa Data created",
                'data' => $result,
            ];
            return response()->json($response, Response::HTTP_CREATED);
        } catch (QueryException $e) {
            return response()->json([
                'message' => "Failed " . $e->errorInfo,
            ]);
        }
    }
}

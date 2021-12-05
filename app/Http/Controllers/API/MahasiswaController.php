<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\PembimbingAkademik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class MahasiswaController extends Controller
{
    public function index()
    {
        if (Auth::user()->hasRole('admin')) {
            $mhs = Mahasiswa::paginate(5);
            $response = [
                'message' => "All Data Angkatan",
                'data' => $mhs,
            ];
            return response()->json($response, Response::HTTP_OK);
        } else if (Auth::user()->hasRole('pa')) {
            if (request('keyword') != null) {
                $mhs =  Mahasiswa::where('pa_id', '=', Auth::user()->pa->id)
                    ->where('nim', 'like', '%' . request('keyword') . '%')
                    ->orWhere('nama', 'like', '%' . request('keyword') . '%')
                    ->get();
            } else {
                $mhs = PembimbingAkademik::find(Auth::user()->pa->id)->mahasiswa;
            }
            $response = [
                'message' => "All Data Angkatan",
                'data' => $mhs,
            ];
            return response()->json($response, Response::HTTP_OK);
        }
    }
}

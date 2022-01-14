<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\MahasiswaResource;
use App\Models\Mahasiswa;
use App\Models\PembimbingAkademik;
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

class MahasiswaController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::user()->hasRole('admin')) {
            if (isset($request->page)) {
                return MahasiswaResource::collection(Mahasiswa::orderBy('nim')->paginate(4));
            } else {
                return MahasiswaResource::collection(Mahasiswa::all());
            }
        } else if (Auth::user()->hasRole('pembimbingakademik')) {
            // if (request('keyword') != null) {
            //     return MahasiswaResource::collection(
            //         Mahasiswa::where('pa_id', '=', Auth::user()->pa->id)
            //             ->where('nim', 'like', '%' . request('keyword') . '%')
            //             ->orWhere('nama', 'like', '%' . request('keyword') . '%')
            //             ->get()
            //     );
            // } else {
            $pa_id = Auth::user()->pa->id;
            return MahasiswaResource::collection(
                Mahasiswa::whereHas('pembimbing_akademik', function ($query) use ($pa_id) {
                    $query->where('id', '=', $pa_id);
                })->paginate(10)
            );

            // }
        } else if (Auth::user()->hasRole('mahasiswa')) {
            return new MahasiswaResource(Mahasiswa::where('user_id', Auth::user()->id)->first());
        }
    }

    public function show($id)
    {
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'nim' => ['required', 'numeric', 'digits:10', 'unique:tb_mahasiswa,nim'],
            'angkatan_id' => ['required'],
            'fakultas_id' => ['required'],
            'jurusan_id' => ['required'],
            'prodi_id' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        DB::beginTransaction();
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            $user->attachRole('mahasiswa');
            event(new Registered($user));

            $mhs = Mahasiswa::create([
                'nim' => $request->nim,
                'nama' => $user->name,
                'user_id' => $user->id,
                'pembimbing_akademik_id' => $request->pembimbing_akademik_id,
                'angkatan_id' => $request->angkatan_id,
                'fakultas_id' => $request->fakultas_id,
                'jurusan_id' => $request->jurusan_id,
                'prodi_id' => $request->prodi_id,
            ]);

            DB::commit();

            $result = new MahasiswaResource(
                Mahasiswa::findOrFail($mhs->id)
            );

            $response = [
                'message' => "Mahasiswa Data created",
                'data' => $result,
            ];
            return response()->json($response, Response::HTTP_CREATED);
        } catch (QueryException $e) {
            DB::rollBack();
            return response()->json([
                'message' => "Failed " . $e->errorInfo,
            ]);
        }
    }

    public function assignMahasiswa(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'pembimbing_akademik_id' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $mahasiswa->update([
                'pembimbing_akademik_id' => $request->pembimbing_akademik_id,
            ]);
            $response = [
                'message' => "Jurusan Updated",
                'data' => new MahasiswaResource($mahasiswa),
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
        $mhs = Mahasiswa::findOrFail($id);
        try {
            User::destroy($mhs->user_id);
            $mhs->delete();
            $response = [
                'message' => "Mahasiswa Deleted",
            ];
            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json([
                'message' => "Failed " . $e->errorInfo,
            ]);
        }
    }
}

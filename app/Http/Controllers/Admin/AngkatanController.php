<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AngkatanRequest;
use App\Models\Angkatan;

class AngkatanController extends Controller
{
    public function index()
    {
        $angkatan = Angkatan::orderBy('tahun')->paginate(4);
        return view('admin.pages.masterdata.angkatan', [
            'angkatan' => $angkatan,
        ]);
    }
}

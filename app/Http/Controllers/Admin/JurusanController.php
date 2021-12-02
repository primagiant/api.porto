<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\JurusanRequest;
use App\Models\Fakultas;
use App\Models\Jurusan;

class JurusanController extends Controller
{
    public function index()
    {
        $jurusan = Jurusan::orderBy('id', 'desc')->paginate(5);
        return view('admin.pages.masterdata.jurusan', compact('jurusan'));
    }
}

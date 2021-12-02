<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FakultasRequest;
use App\Models\Fakultas;

class FakultasController extends Controller
{
    public function index()
    {
        $fakultas = Fakultas::orderBy('id', 'desc')->paginate(4);
        return view('admin.pages.masterdata.fakultas', compact('fakultas'));
    }
}

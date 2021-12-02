<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProdiRequest;
use App\Models\Fakultas;
use App\Models\Prodi;

class ProdiController extends Controller
{
    public function index()
    {
        $prodi = Prodi::orderBy('id', 'desc')->paginate(5);
        return view('admin.pages.masterdata.prodi', compact('prodi'));
    }
}

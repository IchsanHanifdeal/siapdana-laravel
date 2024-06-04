<?php

namespace App\Http\Controllers;

use App\Models\Cicilan;
use Illuminate\Http\Request;

class CicilanController extends Controller
{
    public function index(Request $request) {
        return view('cicilan', [
            'title' => 'Cicilan',
            'active' => 'cicilan',
            'cicilan' => Cicilan::all(),
            'role' => $request->session()->get('role'),
            'nama' => $request->session()->get('nama'),
        ]);
    }
}

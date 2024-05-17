<?php

namespace App\Http\Controllers;

use App\Models\Kreditur;
use Illuminate\Http\Request;

class KrediturController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $role = $request->session()->get('role');
        $nama = $request->session()->get('nama');
        return view('kreditur', [
            'title' => 'Kreditur',
            'active' => 'kreditur',
            'kreditur' => Kreditur::all(),
            'role' => $role,
            'nama' => $nama,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Kreditur $kreditur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kreditur $kreditur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kreditur $kreditur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id_kreditur)
    {
        $kreditur = Kreditur::find($id_kreditur);

        if ($kreditur) {
            $kreditur->delete();

            toastr('Kreditur telah dihapus!', 'success');
        } else {
            toastr('Kreditur gagal dihapus!', 'error');
        }

        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kreditur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register', [
            'title' => 'Register',
        ]);
    }

    public function store(Request $request) {
        DB::beginTransaction();

        try {
            $request->validate([
                'username' => 'required|unique:users,username',
                'nama' => 'required|unique:users,nama',
                'password' => 'required',
                'no_handphone' => 'required|unique:kreditur,no_handphone',
                'tempat' => 'required',
                'tanggal_lahir' => 'required',
                'pekerjaan' => 'required',
                'alamat' => 'required',
            ], [
                'username.unique' => 'Username telah digunakan',
                'nama.unique' => 'Nama telah digunakan',
                'no_handphone.unique' => 'No Handphone telah digunakan',
            ]);

            $user = User::create([
                'nama' => $request->nama,
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role ?? 'user',
            ]);

            if (!$user) {
                toastr()->error('Pendaftaran kreditur gagal!');
                return redirect()->back();
            }

            $userID = $user->id_user;

            $kreditur = Kreditur::create([
                'id_user' => $userID,
                'no_handphone' => $request->no_handphone,
                'tempat' => $request->tempat,
                'tanggal_lahir' => $request->tanggal_lahir,
                'pekerjaan' => $request->pekerjaan,
                'alamat' => $request->alamat,
            ]);

            if (!$kreditur) {
                toastr()->error('Pendaftaran Kreditur gagal!');
                DB::rollBack();
                return redirect()->back();
            }

            DB::commit();

            toastr()->success('Pendaftaran Kreditur Berhasil!');
            return redirect()->route('login');
        } catch (\Exception $e) {
            DB::rollBack();
            toastr()->error('An error occurred. Please try again later. ' . $e->getMessage());
            return redirect()->back();
        }
        
    }
}

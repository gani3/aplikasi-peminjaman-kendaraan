<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Auth.register');
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
        $request->validate([
            'nik' => 'required|unique:users,nik',
            'nohp' => 'required|unique:users,nohp',
            'username' => 'required|unique:users,username',
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ],[
            'nik.required' => 'nik tidak boleh kosong',
            'nik.unique' => 'nik telah terdaftar',
            'nohp.required' => 'no hp tidak boleh kosong',
            'nohp.unique' => 'no hp telah terdaftar',
            'username.required' => 'username tidak boleh kosong',
            'username.unique' => 'username telah terdaftar',
            'name.required' => 'nama lengkap tidak boleh kosong',
            'email.required' => 'email tidak boleh kosong',
            'email.email' => 'format email tidak benar',
            'email.unique' => 'email telah terdaftar',
            'password.required' => 'password tidak boleh kosong',
        ]);

        User::create([
            'nik' => $request->nik,
            'nohp' => $request->nohp,
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => '1',
            'alamat' => $request->alamat,
        ]);

        session()->flash('success','Register berhasil');
        return redirect()->route('register');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function index()
    {
        return view('Auth.login');
    }

    public function proses(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'Email tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong',
        ]);

        // Cek kredensial untuk login
        if (Auth::attempt($credentials)) {
            // Regenerasi session setelah login untuk meningkatkan keamanan
            $request->session()->regenerate();
            
            // menyimpan kedalam log file
            // Log::info('User logged in:', ['user_id' => Auth::id()]);
            return redirect()->route('home');
        }

        return back()->withErrors([
            'pesan-login' => 'Email atau password salah',
        ])->onlyInput('pesan-login');
    }

    public function keluar(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}

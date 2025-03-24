<?php

namespace App\Livewire;

use App\Models\Kendaraan;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class HomeComponents extends Component
{
    public function render()
    {
        $data['total_mobil'] = Kendaraan::count();
        $data['digunakan'] = Kendaraan::where('status_kendaraan','0')->count();
        $data['standby'] = Kendaraan::where('status_kendaraan','1')->count();
        if (Auth::user()->role =='1') {
            $data['peminjaman'] = Peminjaman::with('user','kendaraan')->get();
            $data['pengembalian'] = Pengembalian::with('user','kendaraan','peminjaman')->get();

        }else{
            $data['peminjaman'] = Peminjaman::with('user','kendaraan')->where('user_id',Auth::user()->id)->get();
            $data['pengembalian'] = Pengembalian::with('user','kendaraan','peminjaman')->where('user_id',Auth::user()->id)->get();
        }
        return view('livewire.home-components',$data);
    }
}

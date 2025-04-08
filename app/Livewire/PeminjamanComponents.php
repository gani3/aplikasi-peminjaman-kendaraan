<?php

namespace App\Livewire;

use App\Models\Kendaraan;
use App\Models\Peminjaman;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class PeminjamanComponents extends Component
{
    use WithPagination;
    protected $paginatioTheme = 'bootstarp';
    public $addpage,$editpage = false;
    public $listpage = true;
    public $user_id,$kendaraan_id,$kendaraan,$tgl_keberangkatan,$waktu_peminjaman,$tgl_pengembalian,$tujuan,$status_peminjaman,$keterangan,$id;
    public function render()
    {
        if (Auth::user()->role =='1') {
            $data['peminjaman'] = Peminjaman::with('user','kendaraan')->orderBy('id', 'desc')->get();
        }else{
            $data['peminjaman'] = Peminjaman::with('user','kendaraan')->where('user_id',Auth::user()->id)->orderBy('id', 'desc')->get();
        }
        $data['employes'] = User::all();
        $data['cars'] = Kendaraan::where('status_kendaraan', '1')->get();
        return view('livewire.peminjaman-components',$data);
    }

    public function store(){
        $this->validate([
            'user_id' => 'required',
            'kendaraan_id' => 'required',
            'tgl_keberangkatan' => 'required',
            'waktu_peminjaman' => 'required',
            'tgl_pengembalian' => 'required',
            'tujuan' => 'required',
            'status_peminjaman' => 'required',
            'keterangan' => 'required',
        ],[
            'user_id.required' => 'karyawan tidak boleh kosong',
            'kendaraan_id.required' => 'nopol kendaraan tidak boleh kosong',
            'tgl_keberangkatan.required' => 'tanggal keberangkatan tidak boleh kosong',
            'waktu_peminjaman.required' => 'waktu keberangkatan tidak boleh kosong',
            'tgl_pengembalian.required' => 'tanggal pengembalian tidak boleh kosong',
            'tujuan.required' => 'tujuan tidak boleh kosong',
            'status_peminjaman.required' => 'status peminjaman tidak boleh kosong',
            'keterangan.required' => 'keterangan tidak boleh kosong',
        ]);
        Peminjaman::create([
            'user_id' => $this->user_id,
            'kendaraan_id' => $this->kendaraan_id,
            'tgl_keberangkatan' => $this->tgl_keberangkatan,
            'waktu_peminjaman' => $this->waktu_peminjaman,
            'tgl_pengembalian' => $this->tgl_pengembalian,
            'tujuan' => $this->tujuan,
            'status_peminjaman' => $this->status_peminjaman,
            'keterangan' => $this->keterangan,
        ]);
        $getkendaraan = Kendaraan::find($this->kendaraan_id);
        $getkendaraan->update([
            'status_kendaraan' => ($this->status_peminjaman == '0' || $this->status_peminjaman == '1') ? '0' : '1'
        ]);
        session()->flash('success', 'Berhasil menambahkan data');
        $this->reset();
    }

    public function update($id){
        $updatePeminjaman = Peminjaman::find($id);
        $updatePeminjaman->update([
            'user_id' => $this->user_id,
            'kendaraan_id' => $this->kendaraan_id,
            'tgl_keberangkatan' => $this->tgl_keberangkatan,
            'waktu_peminjaman' => $this->waktu_peminjaman,
            'tgl_pengembalian' => $this->tgl_pengembalian,
            'tujuan' => $this->tujuan,
            'status_peminjaman' => $this->status_peminjaman,
            'keterangan' => $this->keterangan,
        ]);

        $getkendaraan = Kendaraan::find($this->kendaraan_id);
        $getkendaraan->update([
            'status_kendaraan' =>  ($this->status_peminjaman == '1' || $this->status_peminjaman == '3') ? '1' : '0'
        ]);
        session()->flash('success', 'Berhasil melakukan update data');
        $this->reset();
    }

    public function destroy($id){
        $getPeminjaman =  Peminjaman::find($id);
        $getPeminjaman->delete();
        session()->flash('success', 'Berhasil menghapus data');
        $this->reset();
    }

    public function create () {
        $this->reset();
        $this->listpage=false;
        $this->addpage=true;
        $this->editpage=false;
        if (Auth::user()->role == '0') {
            $this->user_id = Auth::user()->id;
            $this->status_peminjaman = '0';
        }
    }

    public function edit ($id) {
        $getPeminjaman = Peminjaman::with('kendaraan')->find($id);
        $this->user_id = $getPeminjaman->user_id;
        $this->kendaraan = $getPeminjaman->kendaraan->nopol;
        $this->kendaraan_id = $getPeminjaman->kendaraan_id;
        $this->tgl_keberangkatan = $getPeminjaman->tgl_keberangkatan;
        $this->waktu_peminjaman = $getPeminjaman->waktu_peminjaman;
        $this->tgl_pengembalian = $getPeminjaman->tgl_pengembalian;
        $this->tujuan = $getPeminjaman->tujuan;
        $this->status_peminjaman = $getPeminjaman->status_peminjaman;
        $this->keterangan = $getPeminjaman->keterangan;
        $this->id = $getPeminjaman->id;
        $this->listpage=false;
        $this->addpage=false;
        $this->editpage=true;
    }

    public function cancel(){
        $this->reset();
    }
}


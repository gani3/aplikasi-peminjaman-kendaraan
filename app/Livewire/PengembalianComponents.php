<?php

namespace App\Livewire;

use App\Models\Kendaraan;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class PengembalianComponents extends Component
{
    use WithPagination;
    protected $paginatioTheme = 'bootstarp';
    public $addpage,$editpage = false;
    public $listpage = true;
    public $user_id,$kendaraan_id,$peminjaman_id,$tgl_pengembalian,$waktu_pengembalian,$status_pengembalian,$ontime,$keterangan,$id;
    public function render()
    {
        if (Auth::user()->role =='1') {
            $data['pengembalian'] = Pengembalian::with('user','kendaraan','peminjaman')->orderBy('id', 'desc')->get();
        }else{
            $data['pengembalian'] = Pengembalian::with('user','kendaraan','peminjaman')->where('user_id',Auth::user()->id)->orderBy('id', 'desc')->get();
        }

        $data['peminjaman'] = Peminjaman::with('user','kendaraan')->where('status_peminjaman', '1')->get();
        return view('livewire.pengembalian-components',$data);
    }

    public function store(){
        $this->validate([
            'peminjaman_id' => 'required',
            'tgl_pengembalian' => 'required',
            'waktu_pengembalian' => 'required',
            'status_pengembalian' => 'required',
            'ontime' => 'required',
            'keterangan' => 'required',
        ],[
            'peminjaman_id.required' => 'Peminjam tidak boleh kosong',
            'tgl_pengembalian.required' => 'tanggal Pengembalian tidak boleh kosong',
            'waktu_pengembalian.required' => 'waktu pengembalian tidak boleh kosong',
            'status_pengembalian.required' => 'status pengembalian tidak boleh kosong',
            'ontime.required' => 'ketepatan waktu tidak boleh kosong',
            'keterangan.required' => 'keterangan tidak boleh kosong',
        ]);

        Pengembalian::create([
            'user_id' => $this->user_id,
            'kendaraan_id' => $this->kendaraan_id,
            'peminjaman_id' => $this->peminjaman_id,
            'tgl_pengembalian' => $this->tgl_pengembalian,
            'waktu_pengembalian' => $this->waktu_pengembalian,
            'status_pengembalian' => $this->status_pengembalian,
            'ontime' => $this->ontime,
            'keterangan' => $this->keterangan,
        ]);

        $getkendaraan = Kendaraan::find($this->kendaraan_id);
        $getkendaraan->update([
            'status_kendaraan' =>  $this->status_pengembalian == '1' ? '1' : '0'
        ]);
        $getpeminjaman = Peminjaman::find($this->peminjaman_id);
        $getpeminjaman->update([
            'status_peminjaman' =>  $this->status_pengembalian == '1' ? '3' : '1'
        ]);
        session()->flash('success', 'Berhasil menambahkan data');
        $this->reset();
    }

    public function update($id){
        $updatePeminjaman = Pengembalian::find($id);
        $updatePeminjaman->update([
            'user_id' => $this->user_id,
            'kendaraan_id' => $this->kendaraan_id,
            'peminjaman_id' => $this->peminjaman_id,
            'tgl_pengembalian' => $this->tgl_pengembalian,
            'waktu_pengembalian' => $this->waktu_pengembalian,
            'status_pengembalian' => $this->status_pengembalian,
            'ontime' => $this->ontime,
            'keterangan' => $this->keterangan,
        ]);

        $getkendaraan = Kendaraan::find($this->kendaraan_id);
        $getkendaraan->update([
            'status_kendaraan' =>  $this->status_pengembalian == '1' ? '1' : '0'
        ]);
        $getpeminjaman = Peminjaman::find($this->peminjaman_id);
        $getpeminjaman->update([
            'status_peminjaman' =>  $this->status_pengembalian == '1' ? '3' : '1'
        ]);

        session()->flash('success', 'Berhasil melakukan update data');
        $this->reset();
    }

    public function destroy($id){
        $getPeminjaman =  Pengembalian::find($id);
        $getPeminjaman->delete();
        session()->flash('success', 'Berhasil menghapus data');
        $this->reset();
    }

    public function create () {
        $this->reset();
        $this->listpage=false;
        $this->addpage=true;
        $this->editpage=false;
    }

    public function edit ($id) {
        $getPengembalian = Pengembalian::find($id);
        $this->user_id = $getPengembalian->user_id;
        $this->kendaraan_id = $getPengembalian->kendaraan_id;
        $this->peminjaman_id = $getPengembalian->peminjaman_id;
        $this->tgl_pengembalian = $getPengembalian->tgl_pengembalian;
        $this->waktu_pengembalian = $getPengembalian->waktu_pengembalian;
        $this->status_pengembalian = $getPengembalian->status_pengembalian;
        $this->ontime = $getPengembalian->ontime;
        $this->keterangan = $getPengembalian->keterangan;
        $this->id = $getPengembalian->id;
        $this->listpage=false;
        $this->addpage=false;
        $this->editpage=true;
    }

    public function cancel(){
        $this->reset();
    }

    public function handlePeminjamanChange(){
        $getPeminjaman = Peminjaman::find($this->peminjaman_id);
        $this->user_id = $getPeminjaman->user_id;
        $this->kendaraan_id = $getPeminjaman->kendaraan_id;
    }
}


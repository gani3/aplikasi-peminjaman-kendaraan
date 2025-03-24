<?php

namespace App\Livewire;

use App\Models\JenisKendaraan;
use App\Models\Kendaraan;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class KendaraanComponents extends Component
{
    use WithPagination,WithFileUploads;
    protected $paginatioTheme = 'bootstarp';
    public $addpage,$editpage = false;
    public $listpage = true;
    public $jenis_kendaraan_id,$merk,$nopol,$warna,$status_kendaraan,$img_kendaraan,$id;
    public function render()
    {
        $data['cars'] = Kendaraan::with('jenisKendaraan')->orderBy('id', 'desc')->get();
        $data['typeCars'] = JenisKendaraan::all();
        return view('livewire.kendaraan-components',$data);
    }

    public function store(){
        $this->validate([
            'jenis_kendaraan_id' => 'required',
            'merk' => 'required',
            'nopol' => 'required|unique:kendaraan,nopol',
            'warna' => 'required',
            'status_kendaraan' => 'required',
            'img_kendaraan' => 'image',
        ],[
            'jenis_kendaraan_id.required' => 'jenis kendaraan tidak boleh kosong',
            'merk.required' => 'merk tidak boleh kosong',
            'nopol.required' => 'nopol tidak boleh kosong',
            'nopol.unique' => 'nopol telah terdaftar',
            'warna.required' => 'warna tidak boleh kosong',
            'status_kendaraan.required' => 'status kendaraan tidak boleh kosong',
            'img_kendaraan.image' => 'file harus bertype gambar (.png, .jpg, .jpeg)',
        ]);
        $this->img_kendaraan->storeAs('kendaraan',$this->img_kendaraan->hashName());
        Kendaraan::create([
            'jenis_kendaraan_id' => $this->jenis_kendaraan_id,
            'merk' => $this->merk,
            'nopol' => $this->nopol,
            'warna' => $this->warna,
            'img_kendaraan' => $this->img_kendaraan->hashName(),
            'status_kendaraan' => $this->status_kendaraan,
        ]);
        session()->flash('success', 'Berhasil menambahkan data kendaraan dengan nomor plat '.$this->nopol);
        $this->reset();
    }

    public function update($id){
        $updatekendaraan = Kendaraan::find($id);
        if (empty($this->img_kendaraan)) {
            $updatekendaraan->update([
                'jenis_kendaraan_id' => $this->jenis_kendaraan_id,
                'merk' => $this->merk,
                'nopol' => $this->nopol,
                'warna' => $this->warna,
                'status_kendaraan' => $this->status_kendaraan,
            ]);
        }else{
            unlink(public_path('storage/kendaraan/'.$updatekendaraan->img_kendaraan));
            $this->img_kendaraan->storeAs('kendaraan',$this->img_kendaraan->hashName(),'public');
            // log untuk melihat kendaraan masuk atau tidak kedalam folder
            Log::info("File tersedia di: " . public_path("storage/kendaraan/" . $this->img_kendaraan->hashName()));
            $updatekendaraan->update([
                'jenis_kendaraan_id' => $this->jenis_kendaraan_id,
                'merk' => $this->merk,
                'nopol' => $this->nopol,
                'warna' => $this->warna,
                'img_kendaraan' => $this->img_kendaraan->hashName(),
                'status_kendaraan' => $this->status_kendaraan,
            ]);
        }
        session()->flash('success', 'Berhasil ,melakukan update data kendaraan dengan nomor plat '.$this->nopol);
        $this->reset();
    }

    public function destroy($id){
        $getkendaraan =  Kendaraan::find($id);
        unlink(public_path('storage/kendaraan/'.$getkendaraan->img_kendaraan));
        $getkendaraan->delete();
        session()->flash('success', 'Berhasil menghapus data kendaraan dengan plat nomor '.$getkendaraan->nopol);
        $this->reset();
    }

    public function create () {
        $this->reset();
        $this->listpage=false;
        $this->addpage=true;
        $this->editpage=false;
    }

    public function edit ($id) {
        $getkendaraan = Kendaraan::find($id);
        $this->jenis_kendaraan_id = $getkendaraan->jenis_kendaraan_id;
        $this->merk = $getkendaraan->merk;
        $this->nopol = $getkendaraan->nopol;
        $this->warna = $getkendaraan->warna;
        $this->id = $getkendaraan->id;
        $this->status_kendaraan = $getkendaraan->status_kendaraan;
        $this->listpage=false;
        $this->addpage=false;
        $this->editpage=true;
    }

    public function cancel(){
        $this->reset();
    }
}

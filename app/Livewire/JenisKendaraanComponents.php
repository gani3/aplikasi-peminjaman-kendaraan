<?php

namespace App\Livewire;

use App\Models\JenisKendaraan;
use Livewire\Component;
use Livewire\WithPagination;

class JenisKendaraanComponents extends Component
{
    use WithPagination;
    protected $paginatioTheme = 'bootstarp';
    public $addpage,$editpage = false;
    public $listpage = true;
    public $jenis_kendaraan,$id;
    public function render()
    {
        $data['typeCars'] = JenisKendaraan::orderBy('id', 'desc')->get();
        return view('livewire.jenis-kendaraan-components',$data);

    }

    public function store(){
        $this->validate([
            'jenis_kendaraan' => 'required',
        ],[
            'jenis_kendaraan.required' => 'jenis kendaraan tidak boleh kosong',
        ]);
        JenisKendaraan::create([
            'jenis_kendaraan' => $this->jenis_kendaraan,
        ]);
        session()->flash('success', 'Berhasil menambahkan data');
        $this->reset();
    }

    public function update($id){
        $updatekendaraan = JenisKendaraan::find($id);
        $updatekendaraan->update([
            'jenis_kendaraan' => $this->jenis_kendaraan,
        ]);
        session()->flash('success', 'Berhasil melakukan update data');
        $this->reset();
    }

    public function destroy($id){
        $getkendaraan =  JenisKendaraan::find($id);
        $getkendaraan->delete();
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
        $getkendaraan = JenisKendaraan::find($id);
        $this->jenis_kendaraan = $getkendaraan->jenis_kendaraan;
        $this->id = $getkendaraan->id;
        $this->listpage=false;
        $this->addpage=false;
        $this->editpage=true;
    }

    public function cancel(){
        $this->reset();
    }
}


<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;

class UsersComponents extends Component
{
    use WithPagination;
    protected $paginatioTheme = 'bootstarp';
    public $addpage,$editpage = false;
    public $listpage = true;
    public $nik,$nohp,$username,$role,$name,$email,$password,$alamat,$id;
    public function render()
    {
        $data['users'] = User::orderBy('id', 'desc')->get();
        return view('livewire.user-components', $data);
    }

    public function store(){
        $this->validate([
            'nik' => 'required|unique:users,nik',
            'nohp' => 'required|unique:users,nohp',
            'username' => 'required|unique:users,username',
            'role' => 'required',
            'name' => 'required',
            'email' => 'required|unique:users,username|email',
            'password' => 'required',
        ],[
            'nik.required' => 'nik tidak boleh kosong',
            'nik.unique' => 'nik telah terdaftar',
            'nohp.required' => 'nohp tidak boleh kosong',
            'nohp.unique' => 'nohp telah terdaftar',
            'username.required' => 'username tidak boleh kosong',
            'username.unique' => 'username telah terdaftar',
            'role.required' => 'role user tidak boleh kosong',
            'name.required' => 'nama lengkap tidak boleh kosong',
            'email.required' => 'email tidak boleh kosong',
            'email.unique' => 'email telah terdaftar',
            'email.email' => 'format email tidak diperbolehkan',
            'password.required' => 'password tidak boleh kosong',
        ]);

        User::create([
            'nik' => $this->nik,
            'nohp' => $this->nohp,
            'username' => $this->username,
            'role' => $this->role,
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'alamat' => $this->alamat,
        ]);
        session()->flash('success','Berhasil menambahkan user');
        $this->reset();
    }

    public function create(){
        $this->listpage = false;
        $this->editpage = false;
        $this->addpage = true;
    }

    public function cancel(){
        $this->reset();
    }

    public function edit($id) {
        $getuser = User::find($id);
        // set variabel sesuai data yang didapatkan dari db
        $this->nik = $getuser->nik;
        $this->nohp = $getuser->nohp;
        $this->username = $getuser->username;
        $this->role = $getuser->role;
        $this->name = $getuser->name;
        $this->email = $getuser->email;
        $this->id = $getuser->id;
        $this->alamat = $getuser->alamat;

        $this->editpage = true;
        $this->listpage = false;
        $this->addpage = false;
    }

    public function update($id) {
        $user = User::find($id);
        if ($this->password == "") {
            $user->update([
                'nik' => $this->nik,
                'nohp' => $this->nohp,
                'username' => $this->username,
                'role' => $this->role,
                'name' => $this->name,
                'email' => $this->email,
                'alamat' => $this->alamat,
            ]);
        }else{
            $user->update([
                'nik' => $this->nik,
                'nohp' => $this->nohp,
                'username' => $this->username,
                'role' => $this->role,
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'alamat' => $this->alamat,
            ]);
        }
        session()->flash('success', 'berhasil melakukan update data');
        $this->reset();
    }

    public function destroy($id) {
        $getuser = User::find($id);
        $getuser->delete();
        session()->flash('success', 'Berhasil menghapus data');
        $this->reset();
    }




}

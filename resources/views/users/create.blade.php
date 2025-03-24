<div>
    <h6 class="mb-4">{{ $addpage ? 'Tambah' : 'Edit' }} Users</h6>
    <form action="{{ route('register.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-floating mb-3">
                    <input type="text" wire:model="nik"  value="{{ @old('nik') }}" class="form-control" id="floatingNik" placeholder="jhondoe">
                    <label for="floatingNik">NIK</label>
                    @error('nik')
                        <span class="form-text text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="text" wire:model="nohp" value="{{ @old('nohp') }}" class="form-control" id="floatingHp" placeholder="jhondoe">
                    <label for="floatingHp">Nomor Hp</label>
                    @error('nohp')
                        <span class="form-text text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="text" wire:model="username" value="{{ @old('username') }}" class="form-control" id="floatingUsername" placeholder="jhondoe" >
                    <label for="floatingUsername">Username</label>
                    @error('username')
                        <span class="form-text text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" wire:model="role" id="floatingRole">
                        <option value="">--pilih role--</option>
                        <option value="0">Karyawan</option>
                        <option value="1">Admin</option>
                    </select>   
                    <label for="floatingRole">Role User</label>
                    @error('role')
                        <span class="form-text text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating mb-3">
                    <input type="text" wire:model="name" value="{{ @old('name') }}" class="form-control" id="floatingName" placeholder="jhondoe">
                    <label for="floatingName">Nama Lengkap</label>
                    @error('name')
                        <span class="form-text text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="text" wire:model="email" class="form-control" value="{{ @old('email') }}" id="floatingMail" placeholder="name@example.com">
                    <label for="floatingMail">Email address</label>
                    @error('email')
                        <span class="form-text text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="password" wire:model="password" class="form-control"  value="{{ @old('password') }}" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                    @error('password')
                        <span class="form-text text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <textarea wire:model="alamat" class="form-control" rows="4" id="floatingAlamat"> {{ @old('alamat') }}</textarea>
                    <label for="floatingAlamat">Alamat</label>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end gap-2">
            <div class="col-auto">
                @if ($addpage)
                    <button wire:click="store" type="button" class="btn btn-success btn-sm">Tambah</button>
                @else
                    <button wire:click="update({{ $id }})" type="button" class="btn btn-success btn-sm">Edit</button>
                @endif
            </div>
            <div class="col-auto">
                <button wire:click="cancel" type="button" class="btn btn-danger btn-sm">Cancel</button>
            </div>
        </div>

    </form>
</div>

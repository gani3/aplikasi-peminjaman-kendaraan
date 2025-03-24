<div>
    <h6 class="mb-4">{{ $addpage ? 'Tambah' : 'Edit' }} Kendaraan</h6>
    <form action="#" method="POST">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="form-floating mb-3">
                    <select class="form-select" wire:model="jenis_kendaraan_id" id="floatingRole">
                        <option value="">--pilih jenis kendaraan--</option>
                        @foreach ( $typeCars as $typeCar )
                            <option value="{{ $typeCar->id }}">{{ $typeCar->jenis_kendaraan }}</option>
                        @endforeach
                    </select>   
                    <label for="floatingRole">Jenis Kendaraan</label>
                    @error('jenis_kendaraan_id')
                        <span class="form-text text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="text" wire:model="merk"  value="{{ @old('merk') }}" class="form-control" id="floatingNik" placeholder="jhondoe">
                    <label for="floatingNik">Merk kendaraan</label>
                    @error('merk')
                        <span class="form-text text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="text" wire:model="nopol" value="{{ @old('nopol') }}" class="form-control" id="floatingHp" placeholder="jhondoe">
                    <label for="floatingHp">Plat Nomor</label>
                    @error('nopol')
                        <span class="form-text text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="text" wire:model="warna" value="{{ @old('warna') }}" class="form-control" id="floatingUsername" placeholder="jhondoe" >
                    <label for="floatingUsername">Warna Kendaraan</label>
                    @error('warna')
                        <span class="form-text text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="file" wire:model="img_kendaraan" value="{{ @old('img_kendaraan') }}" class="form-control" id="floatingUsername" placeholder="jhondoe" >
                    <label for="floatingUsername">Foto Kendaraan</label>
                    @error('img_kendaraan')
                        <span class="form-text text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" wire:model="status_kendaraan" id="floatingRole">
                        <option value="">--pilih status--</option>
                        <option value="0">Dipinjam</option>
                        <option value="1">Standby</option>
                    </select>   
                    <label for="floatingRole">Status Kendaraan</label>
                    @error('status_kendaraan')
                        <span class="form-text text-danger">{{ $message }}</span>
                    @enderror
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

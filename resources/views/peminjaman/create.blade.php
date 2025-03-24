<div>
    <h6 class="mb-4">{{ $addpage ? 'Tambah' : 'Edit' }} Peminjaman</h6>
    <form action="#" method="POST">
        @csrf
        <div class="row">
            <div class="form-floating mb-3">
                @if (auth()->user()->role == '1')
                    <select class="form-select" wire:model="user_id" id="floatingUserId">
                        <option value="">--pilih karyawan--</option>
                        @foreach ( $employes as $employe )
                            <option value="{{ $employe->id }}">{{ $employe->name }}</option>
                        @endforeach
                    </select>   
                    <label for="floatingUserId">Nama Karyawan</label>
                    @error('user_id')
                        <span class="form-text text-danger">{{ $message }}</span>
                    @enderror
                @else
                    <input type="hidden" wire:model="user_id" value="{{ @old('user_id') }}" class="form-control" id="floatingHp" placeholder="jhondoe">
                @endif

            </div>
            <div class="form-floating mb-3">
                @if ($editpage)
                    <input type="text" class="form-control" wire:model="kendaraan" readonly>
                @else
                    <select class="form-select" wire:model="kendaraan_id" id="floatingRole">
                        <option value="">--pilih nopol--</option>
                        @foreach ( $cars as $car )
                            <option value="{{ $car->id }}">{{ $car->nopol }}</option>
                        @endforeach
                    </select>   
                @endif
                <label for="floatingRole">Nopol Kendaraan</label>
                @error('kendaraan_id')
                    <span class="form-text text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-floating mb-3">
                        <input type="date" wire:model="tgl_keberangkatan" value="{{ @old('tgl_keberangkatan') }}" class="form-control" id="floatingHp" placeholder="jhondoe">
                        <label for="floatingHp">Tanggal Berangkat</label>
                        @error('tgl_keberangkatan')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-floating mb-3">
                        <input type="time" wire:model="waktu_peminjaman" value="{{ @old('waktu_peminjaman') }}" class="form-control" id="floatingHp" placeholder="jhondoe">
                        <label for="floatingHp">Waktu Berangkat</label>
                        @error('waktu_peminjaman')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-floating mb-3">
                <input type="date" wire:model="tgl_pengembalian" value="{{ @old('tgl_pengembalian') }}" class="form-control" id="floatingHp" placeholder="jhondoe">
                <label for="floatingHp">Tanggal Pengembalian</label>
                @error('tgl_pengembalian')
                    <span class="form-text text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input type="text" wire:model="tujuan" value="{{ @old('tujuan') }}" class="form-control" id="floatingHp" placeholder="jhondoe">
                <label for="floatingHp">Tujuan</label>
                @error('tujuan')
                    <span class="form-text text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-floating mb-3">
                @if (auth()->user()->role == '1')
                    <select class="form-select" wire:model="status_peminjaman" id="floatingStatusPinjam">
                        <option value="">--pilih status peminjaman--</option>
                        <option value="0">Menunggu</option>
                        <option value="1">Disetujui</option>
                        <option value="2">Ditolak</option>
                        <option value="3">Dikembalikan</option>
                    </select>   
                    <label for="floatingStatusPinjam">Status Peminjaman</label>
                    @error('status_peminjaman')
                        <span class="form-text text-danger">{{ $message }}</span>
                    @enderror
                @else
                <input type="hidden" wire:model="status_peminjaman" value="{{ @old('status_peminjaman') }}" class="form-control" id="floatingHp" placeholder="jhondoe">
                @endif

            </div>
            <div class="form-floating mb-3">
                <textarea wire:model="keterangan" class="form-control" rows="10" id="floatingAlamat"> {{ @old('keterangan') }}</textarea>
                <label for="floatingHp">Keterangan</label>
                @error('keterangan')
                    <span class="form-text text-danger">{{ $message }}</span>
                @enderror
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

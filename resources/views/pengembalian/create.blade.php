<div>
    <h6 class="mb-4">{{ $addpage ? 'Tambah' : 'Edit' }} Peminjaman</h6>
    <form action="#" method="POST">
        @csrf
        <div class="row">
            <div class="form-floating mb-3">
                <select class="form-select" wire:model="peminjaman_id" id="floatingRole" wire:change="handlePeminjamanChange">
                    <option value="">--pilih nama peminjaman--</option>
                    @foreach ( $peminjaman as $pinjam )
                        <option value="{{ $pinjam->id }}">({{ $pinjam->kendaraan->nopol }} ) {{ $pinjam->user->name }}</option>
                    @endforeach
                </select>   
                <label for="floatingRole">Peminjaman</label>
                @error('peminjaman_id')
                    <span class="form-text text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-floating mb-3">
                        <input type="date" wire:model="tgl_pengembalian" value="{{ @old('tgl_pengembalian') }}" class="form-control" id="floatingHp" placeholder="jhondoe">
                        <label for="floatingHp">Tanggal Pengembalian</label>
                        @error('tgl_pengembalian')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-floating mb-3">
                        <input type="time" wire:model="waktu_pengembalian" value="{{ @old('waktu_pengembalian') }}" class="form-control" id="floatingHp" placeholder="jhondoe">
                        <label for="floatingHp">Waktu Pengembalian</label>
                        @error('waktu_pengembalian')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-floating mb-3">
                <select class="form-select" wire:model="status_pengembalian" id="floatingStatusPinjam">
                    <option value="">--pilih status peminjaman--</option>
                    <option value="0">Belum Dikembalikan</option>
                    <option value="1">Dikembalikan</option>
                </select>   
                <label for="floatingStatusPinjam">Status Peminjaman</label>
                @error('status_pengembalian')
                    <span class="form-text text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <select class="form-select" wire:model="ontime" id="floatingStatusPinjam">
                    <option value="">--pilih status--</option>
                    <option value="0">Tepat Waktu</option>
                    <option value="1">Terlambat</option>
                </select>   
                <label for="floatingStatusPinjam">Ketepatan Waktu Pengembalian</label>
                @error('ontime')
                    <span class="form-text text-danger">{{ $message }}</span>
                @enderror
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

<div>
    <h6 class="mb-4">{{ $addpage ? 'Tambah' : 'Edit' }} Kendaraan</h6>
    <form action="#" method="POST">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="form-floating mb-3">
                    <input type="text" wire:model="jenis_kendaraan"  value="{{ @old('jenis_kendaraan') }}" class="form-control" id="floatingNik" placeholder="jhondoe">
                    <label for="floatingNik">Jenis kendaraan</label>
                    @error('jenis_kendaraan')
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

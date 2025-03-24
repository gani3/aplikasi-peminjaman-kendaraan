<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Data Kendaraan</h6>
                <div class="d-flex justify-content-end">
                    <button wire:click="create" class="btn btn-primary mb-4"><li class="fa fa-plus"></li> Tambah</button>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Merk Kendaraan</th>
                            <th scope="col">Jenis Kendaraan</th>
                            <th scope="col">Nopol</th>
                            <th scope="col">Warna</th>
                            <th scope="col">Image</th>
                            <th scope="col">Status</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($cars as $car )
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $car->merk }}</td>
                                <td>{{ $car->jenisKendaraan->jenis_kendaraan }}</td>
                                <td>{{ $car->nopol }}</td>
                                <td>{{ $car->warna }}</td>
                                <td><a href="{{ asset('storage/kendaraan/'.$car->img_kendaraan) }}" target="_blank" rel="noopener noreferrer">gambar</a></td>
                                <td><span class="badge {{ $car->status_kendaraan == '0' ? 'bg-secondary':'bg-success' }}">{{ $car->status_kendaraan == '0' ? 'Dipinjam' : 'Standby' }}</span> </td>
                                <td class="text-center">
                                    <button wire:click="edit({{ $car->id }})" class="badge bg-info border-0 px-2 py-1"><li class="fa fa-edit text-white"></li></button>
                                    <button wire:click="destroy({{ $car->id }})"  wire:confirm="kendaraan dengan nopol ' {{ $car->nopol }} ' akan dihapus, apakah anda yakin ?" class="badge bg-danger border-0 px-2 py-1"><li class="fa fa-trash"></li></button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">
                                    <i class="far fa-folder-open fa-4x"></i> <br>
                                    <span>belum ada data</span>
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
                {{-- <div class="d-flex justify-content-end">
                    {{ $users->links() }}
                </div> --}}
            </div>
        </div>
    </div>
</div>
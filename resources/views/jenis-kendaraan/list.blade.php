<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Data Jenis Kendaraan</h6>
                <div class="d-flex justify-content-end">
                    <button wire:click="create" class="btn btn-primary mb-4"><li class="fa fa-plus"></li> Tambah</button>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Jenis Kendaraan</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($typeCars as $typeCar )
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $typeCar->jenis_kendaraan }}</td>
                                <td class="text-center">
                                    <button wire:click="edit({{ $typeCar->id }})" class="badge bg-info border-0 px-2 py-1"><li class="fa fa-edit text-white"></li></button>
                                    <button wire:click="destroy({{ $typeCar->id }})"  wire:confirm="jenis kendaraan  ' {{ $typeCar->jenis_kendaraan }} ' akan dihapus, apakah anda yakin ?" class="badge bg-danger border-0 px-2 py-1"><li class="fa fa-trash"></li></button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">
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
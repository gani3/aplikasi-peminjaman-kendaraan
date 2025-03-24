<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Data Pengembalian</h6>
                <div class="d-flex justify-content-end">
                    <button wire:click="create" class="btn btn-primary mb-4"><li class="fa fa-plus"></li> Tambah</button>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Peminjam</th>
                            <th scope="col">Kendaraan</th>
                            <th scope="col">Pengembalian</th>
                            <th scope="col" class="text-center">Ketepatan Waktu</th>
                            <th scope="col" class="text-center">Status</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pengembalian as $kembali )
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $kembali->user->name }}</td>
                                <td>{{ $kembali->kendaraan->merk }} - {{ $kembali->kendaraan->nopol }}</td>
                                <td>{{ $kembali->tgl_pengembalian }} {{ $kembali->waktu_pengembalian }}</td>
                                <td class="text-center"><span class="badge {{ $kembali->ontime == '0' ? 'bg-success' : 'bg-danger' }}"> {{ $kembali->ontime == '0' ? 'tepat waktu'  : 'terlambat'}}</span></td>
                                <td class="text-center">
                                    <span
                                     class=" badge
                                        {{ 
                                            $kembali->status_pengembalian == '0' ? 'bg-secondary' : 'bg-success'
                                        }}
                                     ">
                                        {{ 
                                            $kembali->status_pengembalian == '0' ? 'belum dikembalikan' : 'dikembalikan'
                                        }}
                                        </td>
                                    </span>
                                <td class="text-center">
                                    <button wire:click="edit({{ $kembali->id }})" class="badge bg-info border-0 px-2 py-1"><li class="fa fa-edit text-white"></li></button>
                                    <button wire:click="destroy({{ $kembali->id }})"  wire:confirm="peminjaman tanggal  ' {{ $kembali->tgl_keberangkatan }} {{ $kembali->waktu_peminjaman }} ' akan dihapus, apakah anda yakin ?" class="badge bg-danger border-0 px-2 py-1"><li class="fa fa-trash"></li></button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">
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
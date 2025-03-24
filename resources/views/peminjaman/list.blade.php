<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Data Peminjaman</h6>
                <div class="d-flex justify-content-end">
                    <button wire:click="create" class="btn btn-primary mb-4"><li class="fa fa-plus"></li> Tambah</button>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Peminjam</th>
                            <th scope="col">Kendaraan</th>
                            <th scope="col">Berangkat</th>
                            <th scope="col">Pengembalian</th>
                            <th scope="col">Tujuan</th>
                            <th scope="col" class="text-center">Status</th>
                            @if (auth()->user()->role == '1')
                                <th scope="col" class="text-center">Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($peminjaman as $pinjam )
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $pinjam->user->name }}</td>
                                <td>{{ $pinjam->kendaraan->merk }} - {{ $pinjam->kendaraan->nopol }}</td>
                                <td>{{ $pinjam->tgl_keberangkatan }} {{ $pinjam->waktu_peminjaman }}</td>
                                <td>{{ $pinjam->tgl_pengembalian }}</td>
                                <td>{{ $pinjam->tujuan }}</td>
                                <td class="text-center">
                                    <span
                                     class=" badge
                                        {{ $pinjam->status_peminjaman == '0' ? 'bg-secondary' : 
                                        ($pinjam->status_peminjaman == '1' ? 'bg-success' : 
                                        ($pinjam->status_peminjaman == '2' ? 'bg-danger' : 'bg-info')) }}
                                     ">
                                        {{ $pinjam->status_peminjaman == '0' ? 'Menunggu' : 
                                        ($pinjam->status_peminjaman == '1' ? 'Disetujui' : 
                                        ($pinjam->status_peminjaman == '2' ? 'Ditolak' : 'Selesai')) }}</td>
                                    </span>
                                @if (auth()->user()->role == '1')
                                    <td class="text-center">
                                        <button wire:click="edit({{ $pinjam->id }})" class="badge bg-info border-0 px-2 py-1"><li class="fa fa-edit text-white"></li></button>
                                        <button wire:click="destroy({{ $pinjam->id }})"  wire:confirm="peminjaman tanggal  ' {{ $pinjam->tgl_keberangkatan }} {{ $pinjam->waktu_peminjaman }} ' akan dihapus, apakah anda yakin ?" class="badge bg-danger border-0 px-2 py-1"><li class="fa fa-trash"></li></button>
                                    </td>
                                @endif
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
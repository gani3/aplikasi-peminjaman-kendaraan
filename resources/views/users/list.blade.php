<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Data Users</h6>
                <div class="d-flex justify-content-end">
                    <button wire:click="create" class="btn btn-primary mb-4"><li class="fa fa-plus"></li> Tambah</button>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Lengkap</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">No Hp</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Status</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user )
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->nohp }}</td>
                                <td>{{ $user->alamat ? $user->alamat : '-'  }}</td>
                                <td>{{ $user->role === '0' ? 'Karyawan' : 'Admin' }}</td>
                                <td class="text-center">
                                    <button wire:click="edit({{ $user->id }})" class="badge bg-info border-0 px-2 py-1"><li class="fa fa-edit text-white"></li></button>
                                    <button wire:click="destroy({{ $user->id }})"  wire:confirm="user ' {{ $user->name }} ' akan dihapus, apakah anda yakin ?" class="badge bg-danger border-0 px-2 py-1"><li class="fa fa-trash"></li></button>
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
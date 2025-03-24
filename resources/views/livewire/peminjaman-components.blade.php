<div>
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            @if (session()->has('success'))
                @session('success')
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endsession
            @endif
            
            @if ($addpage || $editpage)
                @include('peminjaman.create')
            @endif

            @if ($listpage)
                @include('peminjaman.list')
            @endif
        </div>
    </div>
</div>

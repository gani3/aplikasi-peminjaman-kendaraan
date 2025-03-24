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
                @include('pengembalian.create')
            @endif

            @if ($listpage)
                @include('pengembalian.list')
            @endif
        </div>
    </div>
</div>

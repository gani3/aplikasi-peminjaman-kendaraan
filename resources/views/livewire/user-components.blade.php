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
                @include('users.create')
            @endif

            @if ($listpage)
                @include('users.list')
            @endif
        </div>
    </div>
</div>

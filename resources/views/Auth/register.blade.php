@section('title', 'Register')

@include('layouts.header')

    <body>
        <div class="container-xxl position-relative bg-white d-flex p-0">
            <!-- Spinner Start -->
            <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
                <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
            <!-- Spinner End -->


            <!-- Sign Up Start -->
            <div class="container-fluid">
                <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                    <div class="col-12 col-sm-8 col-md-10 col-lg-5 col-xl-6">
                        <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <a href="index.html" class="">
                                    <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>SIPKEDIN</h3>
                                </a>
                                <h3>Sign Up</h3>
                            </div>
                            @if (session()->has('success'))
                                @session('success')
                                    <div class="alert alert-success" role="alert">
                                        {{ session('success') }}
                                    </div>
                                @endsession
                            @endif
                            <form action="{{ route('register.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" name="nik"  value="{{ @old('nik') }}" class="form-control" id="floatingNik" placeholder="jhondoe">
                                            <label for="floatingNik">NIK</label>
                                            @error('nik')
                                                <span class="form-text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" name="nohp" value="{{ @old('nohp') }}" class="form-control" id="floatingHp" placeholder="jhondoe">
                                            <label for="floatingHp">Nomor Hp</label>
                                            @error('nohp')
                                                <span class="form-text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" name="username" value="{{ @old('username') }}" class="form-control" id="floatingUsername" placeholder="jhondoe">
                                            <label for="floatingUsername">Username</label>
                                            @error('username')
                                                <span class="form-text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" name="name" value="{{ @old('name') }}" class="form-control" id="floatingName" placeholder="jhondoe">
                                            <label for="floatingName">Nama Lengkap</label>
                                            @error('name')
                                                <span class="form-text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" name="email" class="form-control" value="{{ @old('email') }}" id="floatingMail" placeholder="name@example.com">
                                            <label for="floatingMail">Email address</label>
                                            @error('email')
                                                <span class="form-text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-floating mb-4">
                                            <input type="password" name="password" class="form-control"  value="{{ @old('password') }}" id="floatingPassword" placeholder="Password">
                                            <label for="floatingPassword">Password</label>
                                            @error('password')
                                                <span class="form-text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-floating mb-3">
                                    <textarea name="alamat" class="form-control" rows="4" id="floatingAlamat"> {{ @old('alamat') }}</textarea>
                                    {{-- <input type="text" name="name" class="form-control"  placeholder="jhondoe"> --}}
                                    <label for="floatingAlamat">Alamat</label>
                                </div>
    
                                <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Sign Up</button>
                            </form>
                            <p class="text-center mb-0">Already have an Account? <a href="{{ route('login') }}">Sign In</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sign Up End -->
        </div>

        @include('layouts.footer')
    </body>

</html>

        <!-- Sale & Revenue Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="row g-3">
                <div class="col-sm-6 col-xl-4">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-car fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Total Kendaraan</p>
                            <h6 class="mb-0">{{ $total_mobil }}</h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-4">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-minus-circle fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Kendaraan Digunakan</p>
                            <h6 class="mb-0">{{ $digunakan }}</h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-4">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-check-circle fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Kendaraan Standby</p>
                            <h6 class="mb-0">{{ $standby }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sale & Revenue End -->

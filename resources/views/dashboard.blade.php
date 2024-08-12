@extends('components.layout')

@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="d-flex align-items-center">
                            <div class="avatar me-4">
                                <span class="avatar-initial rounded bg-label-primary"><i
                                        class="bx bxs-group bx-md"></i></span>
                            </div>
                            <div class="row">
                                <h4 class="mb-1">{{ $patient->count() }}</h4>
                                <p class="mb-0">Jumlah Pasien</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="d-flex align-items-center">
                            <div class="avatar me-4">
                                <span class="avatar-initial rounded bg-label-primary"><i
                                        class="bx bxs-group bx-md"></i></span>
                            </div>
                            <div class="row">
                                <h4 class="mb-1">{{ $visit->count() }}</h4>
                                <p class="mb-0">Jumlah Kunjungan</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="d-flex align-items-center">
                            <div class="avatar me-4">
                                <span class="avatar-initial rounded bg-label-primary"><i
                                        class="bx bxs-group bx-md"></i></span>
                            </div>
                            <div class="row">
                                <h4 class="mb-1">{{ $drugs->count() }}</h4>
                                <p class="mb-0">Jumlah Obat</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="d-flex align-items-center">
                            <div class="avatar me-4">
                                <span class="avatar-initial rounded bg-label-primary"><i
                                        class="bx bxs-group bx-md"></i></span>
                            </div>
                            <div class="row">
                                <h4 class="mb-1">10</h4>
                                <p class="mb-0">Jumlah Obat Tersedia</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <!-- / Content -->
    @endsection

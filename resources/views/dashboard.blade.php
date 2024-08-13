@extends('components.layout')

@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y pb-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <div class="row no-warp">
            <div class="col-lg-3 col-sm-6 mb-2">
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
            <div class="col-lg-3 col-sm-6 mb-2">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="d-flex align-items-center">
                            <div class="avatar me-4">
                                <span class="avatar-initial rounded bg-label-primary"><i
                                        class="bx bxs-calendar-star bx-md"></i></span>
                            </div>
                            <div class="row">
                                <h4 class="mb-1">{{ $visit->count() }}</h4>
                                <p class="mb-0">Jumlah Kunjungan</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 mb-3">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="d-flex align-items-center">
                            <div class="avatar me-4">
                                <span class="avatar-initial rounded bg-label-primary"><i
                                        class="bx bxs-capsule bx-md"></i></span>
                            </div>
                            <div class="row">
                                <h4 class="mb-1">{{ $drugs->count() }}</h4>
                                <p class="mb-0">Jumlah Obat</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 mb-3">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="d-flex align-items-center">
                            <div class="avatar me-4">
                                <span class="avatar-initial rounded bg-label-primary"><i
                                        class="bx bxs-shield-plus bx-md"></i></span>
                            </div>
                            <div class="row">
                                <h4 class="mb-1">{{ $avl_drugs->count() }}</h4>
                                <p class="mb-0">Obat Tersedia</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-8 col-xl-8 order-0">
                <div class="card">
                    <h5 class="card-header">Kunjungan Terakhir</h5>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <caption class="ms-4">
                                Kunjungan Terakhir
                            </caption>
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Nama</th>
                                    <th>Diagnosa</th>
                                    <th>Nomer Telp</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($recent_visit as $visit)
                                    <tr>
                                        <td>
                                            <span class="fw-medium">{{ $visit->date }}</span>
                                        </td>
                                        <td>
                                            <span class="fw-medium">{{ $visit->patient->name }}</span>
                                        </td>
                                        <td>
                                            {{ Str::limit($visit->diagnose, 25) }}
                                        </td>
                                        <td>
                                            {{ $visit->patient->phone }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
						<div class="col-md-6 col-lg-4 col-xl-4 align-content-stretch ">
							<div class="d-grid gap-2 col-lg-12">
								<a class="btn btn-primary btn-lg" type="button" href="{{route('visit.create')}}">Tambah Kunjungan</a>
								<a class="btn btn-secondary btn-lg" type="button" href="{{route('patients.create')}}">Tambah Pasien</a>
                <img src="{{ asset('img/illustrations/1.png') }}" class="img-fluid"
								height="140" alt="View Badge User" >
							</div>
						</div>
        </div>
    </div>
    <!-- / Content -->
@endsection

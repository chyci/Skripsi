@extends('components.layout')

@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mb-2">
        <div class="d-flex align-items-end row">
            <div class="col-sm-7">
                <div class="card-body">
                    <h5 class="card-title text-primary">{{$patients->first()->name}}</h5>
                    <p class="mb-4">
                        DATA Pasien
                        Data Pasien
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="px-4 table-responsive text-nowrap">
            <div class="mb-2 d-flex justify-content-between align-items-center py-2">
                <h5 class="card-header">Riwayat Pasien</h5>
            </div> 
            <table id="myTable" class="table table-hover">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Tanggal Visit</th>
                        <th class="text-center">Screening</th>
                        <th class="text-center" style="width: 30%;">Diagnosa</th>
                        <th class="text-center">Obat</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($visit as $visit)
                    <tr>
                        <td class="text-center">{{$loop->iteration}}</td>
                        <td class="text-center">
                            <span class="fw-medium">{{$visit->date}}</span>
                        </td>
                        <td>
                            Tekanan Darah : {{ $visit->blood_pressure }} 
                            <br> Asam Urat : {{ $visit->uric_acid }}
                            <br> Gula Darah Puasa : {{ $visit->fasting_glucose }} 
                        </td>
                        <td class="text-center text-break" style="word-wrap: break-word;">
                            {{$visit->diagnose}}
                        </td>
                        <td>
                            @foreach ($visit->drugouts as $drugout)
                                <div class="row mb-2 align-items-center obat-row">
                                    <div class="col-sm-7">
                                        <span class="fw-medium">{{$drugout->drug->name}}</span>
                                    </div>
                                    <div class="col-sm-3">
                                        <span class="fw-medium text-align-end">{{$drugout->quantity}}</span>
                                    </div>
                                </div>
                            @endforeach
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>  
<!-- / Content -->
@endsection

@push('js')
<script type="text/javascript">
    $(document).ready(function () {
        $('#myTable').DataTable({
            columnDefs: [
                { width: "30%", targets: 3 },
                { width: "auto", targets: 4 }
            ]
        });
    });
</script>
@endpush

<style>
    td.text-center.text-break {
        word-wrap: break-word;
        white-space: normal;
    }
</style>

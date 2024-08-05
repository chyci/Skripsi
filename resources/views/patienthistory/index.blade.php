@extends('components.layout')

@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{route('dashboard')}}">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Patient History</li>
    </ol>
  </nav>
  <div class="card">
    <div class="px-4 table-responsive text-nowrap">
  <div class="mb-2 d-flex justify-content-between align-items-center py-2">
    <h5 class="card-header">Riwayat Pasien</h5>
  </div> 
      <table id="myTable" class="table table-hover">
        <thead>
          <tr>
            <th class="text-center">No</th>
            <th class="text-center">Nama</th>
            <th class="text-center">Alamat</th>
            <th class="text-center">Kunjungan</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
           @foreach ($patients as $patient)
          <tr>
            <td class="text-center">{{$loop->iteration}}</td>
            <td class="text-center">
              <span class="fw-medium">{{$patient->name}}</span>
            </td>
            <td>{{Str::limit($patient->address,25)}}</td>
            <td class="text-center">
                <a type="button" href="{{route('patienthistory.show', $patient->id)}}" class="btn btn-xs btn-primary">Cek Riwayat</a>
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
      $(document).ready( function () {
          $('#myTable').DataTable();
      } );
    </script>
@endpush
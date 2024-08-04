@extends('components.layout')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{route('dashboard')}}">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Patient</li>
    </ol>
  </nav>
<div class="card">
  <div class="px-4 table-responsive text-nowrap">
  <div class="mb-2 d-flex justify-content-between align-items-center py-2">
    <h5 class="card-header">Pasien</h5>
    <a href="{{route('patients.create')}}" type="button" class="btn rounded-pill mx-3 btn-primary">
      <span class="tf-icons bx bx-plus bx-18px me-2"></span>Tambah Pasien</a>
      </div> 
      <table id="myTable" class="table table-hover">
        <thead>
          <tr>
            <th>Nama</th>
            <th>Tanggal Lahir</th>
            <th>Gender</th>
            <th>Alamat</th>
            <th>No Telp</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @foreach ($patients as $patient)
          <tr>
            <td>
              <span class="fw-medium">{{$patient->name}}</span>
            </td>
            <td>{{$patient->birth}}</td>
            <td>
              @if ($patient->sex == 'f')
                  <span class="badge rounded-pill bg-label-success">Female</span>
              @elseif ($patient->sex == 'm')
                  <span class="badge rounded-pill bg-label-warning">Male</span>
              @endif
            </td>
            <td>{{Str::limit($patient->address,25)}}</td>
            <td>{{$patient->phone}}</td>
            <td>
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="{{route('patients.edit', $patient->id)}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                  <a class="dropdown-item" href="{{route('patients.destroy',$patient->id)}}"><i class="bx bx-trash me-1"></i> Delete</a>
                </div>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

</div>
    
@endsection

@push('js')
    <script type="text/javascript">
      $(document).ready( function () {
          $('#myTable').DataTable();
      } );
    </script>
@endpush
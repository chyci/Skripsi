@extends('components.layout')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
<div class="card">
  <div class="px-4 table-responsive text-nowrap">
  <div class="mb-2 d-flex justify-content-between align-items-center py-2">
    <h5 class="card-header">Pasien</h5>
    <a href="{{route('patients.create')}}" type="button" class="btn rounded-pill mx-3 btn-primary">
      <span class="tf-icons bx bx-plus bx-18px me-2"></span>Tambah User</a>
      </div> 
      <table id="myTable" class="table table-hover">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama User</th>
            <th>E-mail</th>
            <th>Peran</th>
            <th>Status Aktif</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @foreach ($users as $user)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>
              <span class="fw-medium">{{$user->name}}</span>
            </td>
            <td>{{$user->email}}</td>
            <td>
              {{$user->role}}
            </td>
            <td>{{$user->status}}</td>
            <td>
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="{{--{{route('patients.edit', $patient->id)}}--}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                  <a class="dropdown-item" href="{{--{{route('patients.destroy',$patient->id)}}--}}"><i class="bx bx-trash me-1"></i> Delete</a>
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
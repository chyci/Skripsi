@extends('components.layout')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
<div class="card">
  <div class="table-responsive text-nowrap">
   <div class="mb-2 d-flex justify-content-between align-items-center py-2">
        <h5 class="card-header mb-0">Pasien</h5>
        <a href="{{route('patients.create')}}" type="button " class="btn mx-3 rounded-pill btn-primary">Tambah Pasien</a>
      </div>  
      <table class="table table-hover">
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
              {{$patient->sex}}
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

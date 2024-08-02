@extends('components.layout')

@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
  <div class="px-4 table-responsive text-nowrap">
  <div class="mb-2 d-flex justify-content-between align-items-center py-2">
    <h5 class="card-header">Obat</h5>
    <a href="{{route('drug.create')}}" type="button" class="btn rounded-pill mx-3 btn-primary">
      <span class="tf-icons bx bx-plus bx-18px me-2"></span>Tambah Obat</a>
  </div> 
      <table id="myTable" class="table table-hover">
        <thead>
          <tr>
            <th class="text-center">No</th>
            <th>Nama</th>
            <th class="text-center">Jumlah Stok</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @foreach ($drugs as $key => $drug)
          <tr>
            <td class="text-center">
              <span class="fw-medium">
                {{-- {{$patient->name}} --}}
                {{ ++$key }}
              </span>
            </td>
            <td>
              {{$drug->name}}
            </td>
            <td class="text-center">
              {{ $drug->net_quantity }}
            </td>
            <td>
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu">
              <a class="dropdown-item" href="{{route('drug.edit', $drug->id)}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                  <a class="dropdown-item" href="{{route('drug.destroy',$drug->id)}}"><i class="bx bx-trash me-1"></i> Delete</a>
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
<!-- / Content -->
    
@endsection

@push('js')
    <script type="text/javascript">
      $(document).ready( function () {
          $('#myTable').DataTable();
      } );
    </script>
@endpush
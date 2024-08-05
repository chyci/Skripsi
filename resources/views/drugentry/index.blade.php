@extends('components.layout')

@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{route('dashboard')}}">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Drug Entry</li>
    </ol>
  </nav>
  <div class="card">
    <div class="px-4 table-responsive text-nowrap">
  <div class="mb-2 d-flex justify-content-between align-items-center py-2">
    <h5 class="card-header">Obat Masuk</h5>
    <a href="{{route('drugentry.create')}}" type="button" class="btn rounded-pill mx-3 btn-primary">
      <span class="tf-icons bx bx-plus bx-18px me-2"></span>Tambah Obat Masuk</a>
  </div> 
      <table id="myTable" class="table table-hover">
        <thead>
          <tr>
            <th class="text-center">Nama</th>
            <th class="text-center">Jumlah</th>
            <th class="text-center">Tanggal</th>
            <th class="text-center">Aksi</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @foreach ($drugentry as $drugentry)
          <tr>
            <td class="text-center">
              <span class="fw-medium">
                {{$drugentry->drug->name}}
              </span>
            </td>
            <td class="text-center">
              {{$drugentry->quantity}}
            </td>
            <td class="text-center">
              {{$drugentry->entry_date}}
            </td>
            <td>
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu">
              <a class="dropdown-item" href="{{route('drugentry.edit', $drugentry->id)}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                  <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deleteModal" data-drugentryid="{{ $drugentry->id }}"
                  ><i class="bx bx-trash me-1"></i> Delete</a>
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
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <form class="modal-content" method="POST">
            @csrf
            @method('DELETE')
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalTitle">Hapus Obat Masuk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h6 class="text-center text-bold">Apakah anda yakin ingin menghapus obat masuk ini?</h6>
                <h5 class="text-center text-bold text-danger">
                    {{$drugentry->drug->name}}
                </h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Batal
                </button>
                <button type="submit" class="btn btn-danger">Hapus</button>
            </div>
        </form>
    </div>
</div>
@endsection


@push('js')
    <script type="text/javascript">
      $(document).ready( function () {
          $('#myTable').DataTable();
      } );

      // delete modal
        $('#deleteModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('drugentryid')
            var modal = $(this)
            modal.find('form').attr('action', '/drugentry/destroy/' + id);
        });
    </script>
@endpush
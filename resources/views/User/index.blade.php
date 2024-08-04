@extends('components.layout')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{route('dashboard')}}">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">User</li>
    </ol>
  </nav>
<div class="card">
  <div class="px-4 table-responsive text-nowrap">
  <div class="mb-2 d-flex justify-content-between align-items-center py-2">
    <h5 class="card-header">User</h5>
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
            <td>
              @if ($user->status == '1')
                  <span class="badge rounded-pill bg-label-success">Active</span>
              @elseif ($user->status == '0')
                  <span class="badge rounded-pill bg-label-warning">Inactive</span>
              @endif
            </td>
            <td>
              <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#changeRoleModal" data-userid="{{$user->id}}">
                Change Role
              </button>
              <button type="button" class="btn btn-sm btn-danger">Delete</button>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

</div>


{{-- Modal --}}
<div class="modal fade" id="changeRoleModal" tabindex="-1">
  <div class="modal-dialog modal-sm">
    <form class="modal-content" method="POST">
      @csrf
      @method('PUT')
      <div class="modal-header">
        <h5 class="modal-title" id="changeRoleModalTitle">Confirm Role Change</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h6 class="text-center text-bold">Are you sure you want to change role?</h6>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
          Close
        </button>
        <button type="submit" class="btn btn-warning">Change Role</button>
      </div>
    </form>
  </div>
</div>
{{-- End Modal --}}
    
@endsection

@section('js')
  <script src="{{ asset('/js/ui-modals.js') }}"></script>
@endsection

@push('js')
    <script type="text/javascript">
      $(document).ready( function () {
        $('#myTable').DataTable();
      });

      $('#changeRoleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var id = button.data('userid')
        var modal = $(this)
        modal.find('form').attr('action', '/user/change-role/' + id);
      });
    </script>
@endpush
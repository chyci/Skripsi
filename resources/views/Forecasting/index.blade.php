@extends('components.layout')

@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{route('dashboard')}}">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Forecasting</li>
    </ol>
  </nav>
  <div class="card">
    <div class="px-4 table-responsive text-nowrap">
  <div class="mb-2 d-flex justify-content-between align-items-center py-2">
    <h5 class="card-header">Forecasting</h5>
  </div> 
      <table id="myTable" class="table table-hover">
        <thead>
          <tr>
            <th class="text-center">No</th>
            <th class="text-center">Nama Obat</th>
            <th class="text-center">Forecast</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
           @foreach ($drugs as $drug)
          <tr>
            <td class="text-center">{{$loop->iteration}}</td>
            <td class="text-center">
              <span class="fw-medium">{{$drug->name}}</span>
            </td>
            <td class="text-center">
                <a type="button" href="{{route('forecasting.generateForecast', $drug->id)}}" class="btn btn-xs btn-primary">Prediksi Pengeluaran</a>
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
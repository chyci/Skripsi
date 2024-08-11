@extends('components.layout')

@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('dashboard') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('forecasting.index') }}">Forecasting</a>
        </li>
        <li class="breadcrumb-item active">{{ $drug->name }}</li>
    </ol>
    <div class="card mb-2">
        <div class="d-flex align-items-end row">
            <div class="col-sm-7">
                <div class="card-body">
                    <h5 class="card-title text-primary">{{ $drug->name }}</h5>
                    <p class="mb-4">
                        Forecasting Results
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="px-4 table-responsive text-nowrap">
            <div class="mb-2 d-flex justify-content-between align-items-center py-2">
                <h5 class="card-header">Forecasting Results</h5>
                <div class="card-header d-flex flex-column align-items-center">
                          <h5 class="mb-2 text-success">{{ number_format($forecastResults['averageMape'],3) }}%</h5>
                          <span>Average MAPE</span>
                </div>
            </div> 
            <table id="forecastTable" class="table table-hover">
                <thead>
                    <tr>
                        <th class="text-center">Date</th>
                        <th class="text-center">Actual Sales</th>
                        <th class="text-center">Forecast</th>
                        <th class="text-center">PE</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($forecastResults['results'] as $result)
                    <tr>
                        <td class="text-center">{{ $result['date'] }}</td>
                        <td class="text-center">{{ $result['actual_sales'] }}</td>
                        <td class="text-center">{{ number_format($result['forecast'],3) }}</td>
                        <td class="text-center">{{ number_format((float)$result['pe'],3) }}</td>
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
        $('#forecastTable').DataTable({
            order: [[0, 'asc']]
        });
    });
</script>
@endpush
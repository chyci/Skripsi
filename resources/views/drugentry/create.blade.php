@extends('components.layout')

@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Obat Masuk</h5>
                    <small class="text-muted float-end">Hallo</small>
                </div>
                <div class="card-body">
                    <form action="{{ route('drugentry.store') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Name</label>
                                <div class="col-sm-10">
                                    <div class="position-relative" data-select2-id="18">
                                        <select id="multicol-country" class="select2 form-select select2-hidden-accessible"
                                            data-allow-clear="true" data-select2-id="multicol-country" tabindex="-1"
                                            aria-hidden="true"
                                            name="drug_id">
                                            <option value="" data-select2-id="2">Select</option>
                                            @foreach ($drug as $item)
                                            <option value="{{$item->id}}" data-select2-id="2">{{$item->name}}</option>
                                            @endforeach
                                            
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Quantity</label>
                                <div class="col-sm-10">
                                    <input type="number" id="basic-default-name" placeholder="Jumlah" name="quantity"
                                        class="form-control @error('quantity') invalid @enderror">
                                    @error('quantity')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Tanggal</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="date"
                                        value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" id="html5-date-input"
                                        name='entry_date' class="form-control @error('entry_date') invalid @enderror">
                                    @error('entry_date')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Send</button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- / Content -->
    @endsection

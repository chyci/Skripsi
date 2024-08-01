@extends('components.layout')

@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Kunjungan</h5>
                    <small class="text-muted float-end">edit kunjungan</small>
                </div>
                <div class="card-body">
                    <form action="{{ route('visit.index') }}">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Nama Pasien</label>
                                <div class="col-sm-10">
                                    <div class="position-relative">
                                        <input readonly class="form-control-plaintext "
                                             name="patient_id" value="{{ $visit->patient->name}}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Tanggal</label>
                                <div class="col-sm-10">
                                    <input readonly class="form-control-plaintext" type="date" value="{{ $visit->date }}"
                                        id="html5-date-input" name='date'
                                        class="form-control @error('entry_date') invalid @enderror">
                                    @error('entry_date')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Tekanan Darah</label>
                                <div class="col-sm-10">
                                    <input readonly class="form-control-plaintext" type="number" id="basic-default-name" placeholder="Tekanan Darah saat diperiksa"
                                        name="blood_pressure" value="{{ $visit->blood_pressure }}"
                                        class="form-control @error('quantity') invalid @enderror">
                                    @error('quantity')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Asam Urat</label>
                                <div class="col-sm-10">
                                    <input readonly class="form-control-plaintext" type="number" id="basic-default-name" placeholder="Asam Urat saat diperiksa"
                                        name="uric_acid" value="{{ $visit->uric_acid }}"
                                        class="form-control @error('quantity') invalid @enderror">
                                    @error('quantity')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Gula Darah Puasa</label>
                                <div class="col-sm-10">
                                    <input readonly class="form-control-plaintext" type="number" id="basic-default-name" placeholder="Gula darah puasa jika ada"
                                        name="fasting_glucose" value="{{ $visit->fasting_glucose }}" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Diagnosa</label>
                                <div class="col-sm-10">
                                    <input readonly class="form-control-plaintext" type="text" id="basic-default-name" placeholder="Diagnosa setelah diperiksa"
                                        name="diagnose" value="{{ $visit->diagnose }}"
                                        class="form-control @error('quantity') invalid @enderror">
                                    @error('quantity')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="obat" class="col-sm-2 col-form-label">Obat</label>
                                <div class="col-sm-10">
                                    <div id="obat-fields">
                                        @foreach ($drugouts as $drugout)
                                            <div class="row mb-2 align-items-center obat-row">
                                                <div class="col-sm-5">
                                                    <input readonly class="form-control-plaintext" name="drug_id[]" value="{{$drugout->drug->name}}"/> 
                                                </div>
                                                <div class="col-sm-5">
                                                    <input readonly class="form-control-plaintext" type="number" class="form-control @error('quantity') invalid @enderror" name="quantity[]"
                                                        value="{{ $drugout->quantity }}" required>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button class="btn btn-primary">Close</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
@endsection

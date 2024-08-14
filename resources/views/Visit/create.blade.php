@extends('components.layout')

@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('visit.index') }}">Kunjungan</a>
            </li>
            <li class="breadcrumb-item active">create</li>
        </ol>
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Kunjungan</h5>
                    <small class="text-muted float-end">Hallo</small>
                </div>
                <div class="card-body">
                    <form action="{{ route('visit.store') }}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="row mb-3">
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Nama Pasien</label>
                                <input type="hidden" name="patient_id" id="patient_id">
                                <div class="col-sm-10">
                                    <div class="position-relative" data-select2-id="18">
                                        <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Cari Pasien...">
                                        <datalist id="datalistOptions">
                                            @foreach ($patients as $patient)
                                            <option value="{{ $patient->name }}" data-value="{{ $patient->id }}"></option>
                                            @endforeach
                                        </datalist>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Tanggal</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="date"
                                        value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" id="html5-date-input"
                                        name='date' class="form-control @error('entry_date') invalid @enderror">
                                    @error('entry_date')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Tekanan Darah</label>
                                <div class="col-sm-10">
                                    <input type="number" id="basic-default-name" placeholder="Tekanan Darah saat diperiksa"
                                        name="blood_pressure" class="form-control @error('quantity') invalid @enderror">
                                    @error('quantity')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Asam Urat</label>
                                <div class="col-sm-10">
                                    <input type="number" id="basic-default-name" placeholder="Asam Urat saat diperiksa"
                                        name="uric_acid" class="form-control @error('quantity') invalid @enderror">
                                    @error('quantity')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Gula Darah Puasa</label>
                                <div class="col-sm-10">
                                    <input type="number" id="basic-default-name" placeholder="Gula darah puasa jika ada"
                                        name="fasting_glucose" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Diagnosa</label>
                                <div class="col-sm-10">
                                    <input type="text" id="basic-default-name" placeholder="Diagnosa setelah diperiksa"
                                        name="diagnose" class="form-control @error('quantity') invalid @enderror">
                                    @error('quantity')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="obat" class="col-sm-2 col-form-label">Obat</label>
                                <div class="col-sm-10">
                                    <div id="obat-fields">
                                        <div class="row mb-2 align-items-center">
                                            <div class="col-sm-5">
                                                <select class="select2 form-select" name="drug_id[]" required>
                                                    <option value="">Pilih Obat</option>
                                                    @foreach ($drugs as $drug)
                                                        <option class="@error('drug_id') invalid @enderror"
                                                            value="{{ $drug->id }}">{{ $drug->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-sm-5">
                                                <input type="number" class="form-control" name="quantity[]"
                                                    placeholder="Dosis Obat" required>
                                            </div>
                                            <div class="col-sm-2">
                                                <button type="button" class="btn btn-danger remove-obat">Hapus</button>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-primary" id="add-obat">Tambah Obat</button>
                                </div>
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

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var obatFields = document.getElementById('obat-fields');
            var addObatButton = document.getElementById('add-obat');

            addObatButton.addEventListener('click', function() {
                var newObatField = document.createElement('div');
                newObatField.classList.add('row', 'mb-2', 'align-items-center');
                newObatField.innerHTML = `
            <div class="col-sm-5">
                <select class="select2 form-select" name="drug_id[]">
                    <option value="">Pilih Obat</option>
                    @foreach ($drugs as $drug)
                    <option value="{{ $drug->id }}">{{ $drug->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="quantity[]" placeholder="Dosis Obat">
            </div>
            <div class="col-sm-2">
                <button type="button" class="btn btn-danger remove-obat">Hapus</button>
            </div>
        `;
                obatFields.appendChild(newObatField);

                newObatField.querySelector('.remove-obat').addEventListener('click', function() {
                    newObatField.remove();
                });
            });

            obatFields.addEventListener('click', function(e) {
                if (e.target.classList.contains('remove-obat')) {
                    e.target.closest('.row').remove();
                }
            });
        });
        
        $('#exampleDataList').on('input', function(e) {
            var shownVal = document.getElementById("exampleDataList").value;
            var value2send = document.querySelector("#datalistOptions option[value='"+shownVal+"']").dataset.value;
            $('#patient_id').val(value2send);
        });
    </script>
    
@endsection

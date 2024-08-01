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
                    <form action="{{ route('visit.update', $visit->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Nama Pasien</label>
                                <div class="col-sm-10">
                                    <div class="position-relative" data-select2-id="18">
                                        <select id="multicol-country" class="select2 form-select select2-hidden-accessible"
                                            data-allow-clear="true" data-select2-id="multicol-country" tabindex="-1"
                                            aria-hidden="true" name="patient_id">
                                            <option value="" data-select2-id="2">Select</option>
                                            @foreach ($patient as $patient)
                                                <option value="{{ $patient->id }}" data-select2-id="2"
                                                    {{ $patient->id == $visit->patient_id ? 'selected' : '' }}>
                                                    {{ $patient->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Tanggal</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="date" value="{{ $visit->date }}"
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
                                    <input type="number" id="basic-default-name" placeholder="Tekanan Darah saat diperiksa"
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
                                    <input type="number" id="basic-default-name" placeholder="Asam Urat saat diperiksa"
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
                                    <input type="number" id="basic-default-name" placeholder="Gula darah puasa jika ada"
                                        name="fasting_glucose" value="{{ $visit->fasting_glucose }}" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Diagnosa</label>
                                <div class="col-sm-10">
                                    <input type="text" id="basic-default-name" placeholder="Diagnosa setelah diperiksa"
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
                                                    <select class="select2 form-select" name="drug_id[]">
                                                        <option value="">Pilih Obat</option>
                                                        @foreach ($drugs as $drug)
                                                            <option class="@error('drug_id[]') invalid @enderror"
                                                                value="{{ $drug->id }}"
                                                                {{ $drug->id == $drugout->drug_id ? 'selected' : '' }}>
                                                                {{ $drug->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('drug_id')
                                                        <div class="form-text text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-5">
                                                    <input type="number" class="form-control @error('quantity') invalid @enderror" name="quantity[]"
                                                        value="{{ $drugout->quantity }}">
                                                </div>
                                                <div class="col-sm-2">
                                                    <button type="button" class="btn btn-danger remove-obat">Hapus</button>
                                                </div>
                                                @error('quantity')
                                                    <div class="form-text text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        @endforeach
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
    </div>
    <!-- / Content -->
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var obatFields = document.getElementById('obat-fields');
        var addObatButton = document.getElementById('add-obat');

        // Function to add event listener for all remove buttons
        function addRemoveListener(removeButton) {
            removeButton.addEventListener('click', function() {
                removeButton.closest('.obat-row').remove();
            });
        }

        // Add event listener for existing remove buttons
        document.querySelectorAll('.remove-obat').forEach(function(button) {
            addRemoveListener(button);
        });

        // Add new obat row
        addObatButton.addEventListener('click', function() {
            var newObatField = document.createElement('div');
            newObatField.classList.add('row', 'mb-2', 'align-items-center', 'obat-row');
            newObatField.innerHTML = `
            <div class="col-sm-5">
                <select class="select2 form-select" name="drug_id[]">
                    <option value="">Pilih Obat</option>
                    @foreach ($drugs as $drug)
                    <option value="{{ $drug->id }}">{{ $drug->name }}</option>
                    @endforeach
                </select>
                @error('drug_id')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-sm-5">
                <input type="number" class="form-control" name="quantity[]" placeholder="Dosis Obat">
                @error('quantity')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-sm-2">
                <button type="button" class="btn btn-danger remove-obat">Hapus</button>
            </div>
            `;
            obatFields.appendChild(newObatField);

            // Add event listener for the new remove button
            addRemoveListener(newObatField.querySelector('.remove-obat'));
        });
    });
</script>

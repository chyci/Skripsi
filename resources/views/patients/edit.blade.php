@extends('components.layout')

@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
<div class="col-xxl">
    <div class="card mb-4">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Pasien</h5>
        <small class="text-muted float-end">Default label</small>
    </div>
    <div class="card-body">
        <form action="{{route('patients.update',$patient->id)}}" method="POST">
            @csrf
            @method("PUT")
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-name">Nama</label>
            <div class="col-sm-10">
            <input type="text" id="basic-default-name" value="{{$patient->name}}" name="name"
                class="form-control @error('name') invalid @enderror">
                @error('name')
                <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="html5-date-input" class="col-md-2 col-form-label">Tanggal Lahir</label>
            <div class="col-md-10">
                <input class="form-control" type="date" value="{{$patient->birth}}" id="html5-date-input" name='birth'>
            </div>
        </div>
        <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="sex" class="form-label">Jenis Kelamin</label>
        <div class="col-sm-10">
        <select id="sex" class="form-select" name="sex">
            <option @selected($patient->sex == 'f') value="f">Female</option>
            <option @selected($patient->sex == 'm') value="m">Male</option>
        </select>
        </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-phone">No Telp</label>
            <div class="col-sm-10">
            <input type="text" id="basic-default-phone" value="{{$patient->phone}}" placeholder="658 799 8941" aria-label="658 799 8941" aria-describedby="basic-default-phone" name="phone"
                class="form-control phone-mask @error('phone') invalid @enderror">
                @error('phone')
                <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-message">Alamat</label>
            <div class="col-sm-10">
            <textarea id="basic-default-message" aria-label="Hi, Do you have a moment to talk Joe?" aria-describedby="basic-icon-default-message2" name="address"
             class="form-control @error('address') invalid @enderror">
            {{$patient->address}}
            @error('address')
            <div class="form-text text-danger">{{ $message }}</div>
            @enderror
            </textarea>
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
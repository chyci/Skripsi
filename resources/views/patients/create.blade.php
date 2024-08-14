@extends('components.layout')

@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard')}}">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('patient')}}">Patient</a>
    </li>
    <li class="breadcrumb-item active">Create</li>
</ol>
<div class="col-xxl">
    <div class="card mb-4">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Basic Layout</h5>
        <small class="text-muted float-end">Default label</small>
    </div>
    <div class="card-body">
        <form action="{{route('patients.store')}}" method="POST">
            @csrf
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-name">Nama</label>
            <div class="col-sm-10">
            <input type="text" id="basic-default-name" placeholder="John Doe" name="name"
                class="form-control @error('name') invalid @enderror">
                @error('name')
                <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="html5-date-input" class="col-md-2 col-form-label">Tanggal Lahir</label>
            <div class="col-md-10">
                <input class="form-control" type="date" value="2021-06-18" id="html5-date-input" name='birth'>
            </div>
        </div>
        <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="sex" class="form-label">Jenis Kelamin</label>
        <div class="col-sm-10">
        <select id="sex" class="form-select" name="sex">
            <option value="f">Female</option>
            <option value="m">Male</option>
        </select>
        </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-phone">No Telp</label>
            <div class="col-sm-10">
            <input type="text" id="basic-default-phone" placeholder="658 799 8941" aria-label="658 799 8941" aria-describedby="basic-default-phone" name="phone"
                class="form-control phone-mask @error('phone') invalid @enderror">
                @error('phone')
                <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-message">Alamat</label>
            <div class="col-sm-10">
            <textarea id="basic-default-message" placeholder="Masukan alamat" aria-describedby="basic-icon-default-message2" name="address"
            class="form-control @error('address') invalid @enderror"></textarea>
            </div>
            @error('address')
            <div class="form-text text-danger">{{ $message }}</div>
            @enderror
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

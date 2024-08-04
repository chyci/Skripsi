@extends('components.layout')

@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
    <li class="breadcrumb-item">
    <a href="{{route('dashboard')}}">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
    <a href="{{route('drug')}}">Drug</a>
    </li>
    <li class="breadcrumb-item active">Edit</li>
</ol>
</nav>
<div class="col-xxl">
    <div class="card mb-4">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Drug</h5>
        <small class="text-muted float-end">Default label</small>
    </div>
    <div class="card-body">
        <form action="{{route('drug.update',$drug->id)}}" method="POST">
            @csrf
            @method("PUT")
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-name">Name</label>
            <div class="col-sm-10">
            <input type="text" id="basic-default-name" value="{{$drug->name}}" name="name"
                class="form-control @error('name') invalid @enderror">
                @error('name')
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

@extends('components.layout')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard')}}">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('user.index')}}">User</a>
    </li>
    <li class="breadcrumb-item active">Edit</li>
</ol>
    @if (session('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            Password berhasil diubah.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <!-- Content -->
        <div class="card mb-4">
            <h5 class="card-header">Profile Details</h5>
            <!-- Account -->
            <div class="card-body">
                <div class="d-flex align-items-start align-items-sm-center gap-4">
                    <img src="{{asset('/img/avatars/8.jpeg')}}" alt="user-avatar" class="d-block rounded" height="100"
                        width="100" id="uploadedAvatar">
                    <div class="">
                        <h5 class="card-title text-primary">{{ Auth::user()->name }}</h5>
                    <p class="mb-2">
                        {{ Auth::user()->role }}
                    </p>
                    <span class="badge rounded-pill bg-label-success">Active</span>
                    </div>
                </div>
            </div>
            <hr class="my-0">
            <div class="card-body">
                <form id="formAccountSettings" action="{{route('user.change-password', Auth::user()->id)}}" method="POST">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="firstName" class="form-label">Name</label>
                            <input class="form-control" type="text" id="name" readonly value="{{ Auth::user()->name }}"
                                autofocus="">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">E-mail</label>
                            <input class="form-control" type="text" id="email" readonly
                                value="{{ Auth::user()->email }}">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="password" class="form-label">Kata Sandi Lama</label>
                            <input class="form-control" type="password" id="password" name="oldpassword"
                                value="" placeholder="********" @error('oldpassword') invalid @enderror>
                            @error('oldpassword') <div class="form-text text-danger">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="password" class="form-label">Kata Sandi Baru</label>
                            <input class="form-control" type="password" id="password" name="newpassword"
                                value="" placeholder="********" @error('newpassword') invalid @enderror>
                            @error('newpassword') <div class="form-text text-danger">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="password" class="form-label">Konfirmasi Kata Sandi</label>
                            <input class="form-control" type="password" id="password" name="confirmationpassword"
                                value="" placeholder="********" @error('confirmationpassword') invalid @enderror>
                            @error('confirmationpassword') <div class="form-text text-danger">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary me-2">Save changes</button>
                        <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
            <!-- /Account -->
        <!-- / Content -->
</div>
@endsection

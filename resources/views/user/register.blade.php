@extends('layout.app')
@section('title','Register')
@section('content')
<div class="row justify-content-center mt-4 mb-4">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h2>Sign up</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('registerGet') }}" method="GET">
                    @csrf
                    <input class="form-control" type="text" name="name" placeholder="Inter your name" value="{{ old('name') }}">
                    {{-- show error --}}
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <input class="form-control mt-2" type="text" name="uname" placeholder="Inter your user name" value="{{ old('uname') }}">
                    {{-- show error --}}
                    @error('uname') 
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <input class="form-control mt-2" type="email" name="email" placeholder="Inter your valid email" value="{{ old('email') }}">
                    {{-- show error --}}
                    @error('email')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <input class="form-control mt-2" type="password" name="password" placeholder="Type a strong password">
                    {{-- show error --}}
                    @error('password')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <input class="form-control mt-2" type="password" name="password_confirmation" placeholder="Retype your password">
                    <input class="btn btn-success mt-2" type="submit" name="submit" value="Register">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layout.app')
@section('title','Log in')
@section('content')
<div class="row justify-content-center mt-4 mb-4">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h2>Sign in</h2>
                @if (session('registerSuccess'))
                    <div class="alert alert-success">
                        {{ session('registerSuccess') }}
                    </div>
                @endif
                @if (session('emailVerify'))
                    <div class="alert alert-success">
                        {{ session('emailVerify') }}
                    </div>
                @endif
                @if (session('login-fail'))
                    <div class="alert alert-danger">
                        {{ session('login-fail') }}
                    </div>
                @endif
                @if (session('logoutMassage'))
                    <div class="alert alert-danger">
                        {{ session('logoutMassage') }}
                    </div>
                @endif
                @if (session('youCantGo'))
                    <div class="alert alert-danger">
                        {{ session('youCantGo') }}
                    </div>
                @endif
            </div>
            <div class="card-body">
                <form action="{{ route('loginGet') }}" method="GET">
                    @csrf
                    <input class="form-control" type="text" name="uname" placeholder="Inter your user name">
                    {{-- show error --}}
                    @error('uname') 
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <input class="form-control mt-2" type="password" name="password" placeholder="Inter your password">
                    {{-- show error --}}
                    @error('password')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <input class="btn btn-success mt-2" type="submit" name="submit" value="Log in">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
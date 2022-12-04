<!doctype html>
@extends("template.index")
@section("content")
<div class="container mt-5" style="height:50%">
    <div class="card mx-auto" style="max-width:400px;">
        <div class="card-body">
            <form method="POST" action="{{ route('register.process') }}">
                <h1 class="text-center">Daftar</h1>
                @csrf
                @if(session("pesan"))
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <div class="btn-close" data-bs-dismiss="alert"></div>
                    {{ session("pesan") }}
                </div> @endif

                @if(session("sukses"))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <div class="btn-close" data-bs-dismiss="alert"></div>
                    {{ session("sukses") }}
                </div> @endif
                <div class="mb-3">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="email" name="email" value="{{@old('email')}}">
                    <div class="invalid-feedback">
                        @error("email")
                        {{$message}}
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control @error('username') is-invalid @enderror" placeholder="username" name="username" value="{{@old('username')}}">
                    <div class="invalid-feedback">
                        @error("username")
                        {{$message}}
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="password" name="password">
                    <div class="invalid-feedback">
                        @error("password")
                        {{$message}}
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <input type="submit" class="form-control btn btn-primary" placeholder="password" value="Login">
                </div>
            </form>
        </div>
    </div>
</div>
@endSection()

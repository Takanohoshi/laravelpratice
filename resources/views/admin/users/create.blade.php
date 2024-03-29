@extends('layouts.mimin')

@section('container')
    
<h1 class="h2">Create User</h1>

<div class="col-lg-8">
    <a href="{{ route('users.index') }}" class="btn btn-secondary mb-3">Back</a>

    <form action="{{ route('users.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name') }}" placeholder="Nama">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" required autofocus value="{{ old('username') }}" placeholder="Username">
            @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required autofocus value="{{ old('email') }}" placeholder="Email">
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required autofocus placeholder="Password">
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
        <label for="level" class="form-label">Role</label>
        <select name="level" id="level" class="form-select">
            <option value="admin">Admin</option>
            <option value="petugas">Petugas</option>
        </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection
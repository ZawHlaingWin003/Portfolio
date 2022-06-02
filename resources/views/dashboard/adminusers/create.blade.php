@extends('dashboard.master')

@section('title', '| AdminUsers')


@section('content')

<div class="container">
    <div class="go-to-back">
        <a href="{{ route('admin_users.index') }}" class="line-btn">&larr; Go To User List</a>
    </div>
    <div class="main-title">
        Create New User
    </div>
    <div class="form-group w-50 mx-auto my-5">
        @if (Session('success'))
            <p class="alert alert-success">{{ session('success') }}</p>
        @endif
        <form action="{{ route('admin_users.store') }}" method="POST" autocomplete="off">
            @csrf

            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="name" id="username" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" autofocus>
                @error('name')
                    <small><span class="text-danger">* {{ $message }}</span></small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" @error('email') is-invalid @enderror" value="{{ old('email') }}">
                @error('email')
                    <small><span class="text-danger">* {{ $message }}</span></small>
                @enderror
            </div>
            <label for="" class="form-label">Password</label>
            <div class="input-group" id="show-hide-password">
                <input type="password" class="form-control" id="password" name="password" @error('password') is-invalid @enderror">
                <button class="btn btn-outline-secondary" type="button" id="showandhide"><i class="fa fa-eye-slash" id="icon"></i></button>
            </div>
            @error('password')
                <small><span class="text-danger">* {{ $message }}</span></small>
            @enderror
            <div class="mt-3 mb-5">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="text" class="form-control" id="phone" name="phone" @error('phone') is-invalid @enderror" value="{{ old('phone') }}">
                @error('phone')
                    <small><span class="text-danger">* {{ $message }}</span></small>
                @enderror
            </div>
            <div class="mb-3">
                <button class="main-btn" type="submit">Add User <i class="fa fa-plus"></i></button>
            </div>
        </form>
    </div>
</div>

@endsection


@section('custom_js')

<script>
$(document).ready(function() {
    $("#showandhide").on('click', function() {

        var passwordField = $("#password");
		var passwordFieldType = passwordField.attr("type");

		if(passwordFieldType == "password"){
			passwordField.attr("type","text");
            $('#icon').removeClass('fa-eye-slash');
            $("#icon").addClass('fa-eye');
		}
		else{
			passwordField.attr("type", "password");
            $('#icon').addClass('fa-eye-slash');
            $("#icon").removeClass('fa-eye');
		}
    });
});
</script>

@endsection

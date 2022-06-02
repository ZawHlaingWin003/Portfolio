@extends('dashboard.master')

@section('title', '| Create Category')

@section('content')

<div class="container">
    <div class="go-to-back">
        <a href="{{ route('categories.index') }}" class="line-btn">&larr; Go To Back</a>
    </div>

    <div class="row justify-content-center">



        <div class="col-md-6 text-dark">

            @if (Session('success'))
                <p class="alert alert-success">{{ session('success') }}</p>
            @endif

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('categories.store') }}" method="POST">
                        @csrf

                        <div class="my-3">
                            <label for="name" class="form-label">Category Name</label>
                            <input type="text" name="name" id="name" class="form-control">
                            <div id="passwordHelpBlock" class="form-text">
                            Category name must be 8-20 characters long and must not contain special characters, or emoji.
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-sm">Add Category &plus;</button>

                    </form>
                </div>
            </div>
        </div>
    </div>


</div>

@endsection

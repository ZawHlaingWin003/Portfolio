@extends('dashboard.master')

@section('title', '| Categories List')

@section('content')
    <div class="container">

        <div class="go-to-back">
            <a href="{{ route('blogs.home') }}" class="line-btn">&larr; Go To Back</a>
        </div>

        <div class="row justify-content-center my-5">
            <div class="col-md-8">
                @if (Session('success'))
                    <p class="alert alert-success">{{ session('success') }}</p>
                @endif

                <a href="{{ route('categories.create') }}" class="main-btn create-btn">Create Category <i class="fa fa-user-plus"></i></a>
                <table class="table table-dark table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td>

                                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i> Edit</a>

                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash"></i> Delete</button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

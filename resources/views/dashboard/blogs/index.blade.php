@extends('dashboard.master')

@section('title', '| Blogs List')

@section('custom_css')
<style>
.permission{
    color: red;
}
</style>
@endsection

@section('content')
    <div class="container">

        <div class="go-to-back">
            <a href="{{ route('blogs.index') }}" class="line-btn">View Blogs on Page &rarr;</a>
        </div>

        <div class="row justify-content-center my-5">
            <div class="col-md-10">
                @if (Session('success'))
                    <p class="alert alert-success">{{ session('success') }}</p>
                @endif

                <a href="{{ route('blogs.create') }}" class="main-btn create-btn">Create New Blog <i class="fa fa-user-plus"></i></a>



                @foreach ($blogs as $blog)
                <div class="card bg-dark my-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h4><a href="{{ route('blogs.show', $blog) }}" class="blog-title line-btn">{{ $blog->title }}</a></h4>
                            </div>
                            <div class="col-md-3">
                                <span class="badge bg-primary">{{ $blog->category->name }}</span>
                            </div>
                            <div class="col-md-3">
                                <p>{{ $blog->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        @auth
                            @if (auth()->user()->id == $blog->author->id)
                                <a href="{{ route('blogs.edit', $blog) }}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i> Edit</a>

                                <form action="{{ route('blogs.destroy', $blog) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Are You Sure')"><i class="fa fa-trash"></i> Delete</button>
                                </form>
                            @else
                                <p class="permission">!!! This blog is belonged to other admin.! </p>
                            @endif
                        @endauth
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection

@extends('dashboard.master')

@section('title', '| Create Project')

@section('content')
    <p class="my-5"><a href="/#projects" target="__blank" class="line-btn">View Projects on Page&rarr;</a></p>
    <div class="table-wrapper">
        @if (Session('success'))
            <p class="alert alert-success">{{ session('success') }}</p>
        @endif
        <a href="{{ route('projects.create') }}" class="main-btn create-btn">Create New Project <i class="fa fa-user-plus"></i></a>
        <table class="fl-table">
            <thead>
                <tr>
                    <th>No <i class="fa fa-list-ol"></i> </th>
                    <th>Title <i class="fa fa-user"></i> </th>
                    <th>Project Link <i class="fa fa-at"></i> </th>
                    <th>Actions <i class="fa fa-radiation"></i> </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $project->title }}</td>
                        <td><a href="{{ $project->project_link }}">{{ $project->title }}</a></td>\
                        <td>

                                <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i> Edit</a>

                                <form action="{{ route('projects.destroy', $project->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash"></i> Delete Project</button>
                                </form>

                        </td>
                    </tr>
                @endforeach
            <tbody>
        </table>

    </div>
@endsection

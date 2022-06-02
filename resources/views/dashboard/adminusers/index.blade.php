
@extends('dashboard.master')

@section('title', '| AdminUsers')

@section('content')

<div class="table-wrapper">
    @if (Session('success'))
        <p class="alert alert-success">{{ session('success') }}</p>
    @endif

    <a href="{{ route('admin_users.create') }}" class="main-btn create-btn">Create New Admin <i class="fa fa-user-plus"></i></a>
    <table class="fl-table">
        <thead>
            <tr>
                <th>No <i class="fa fa-list-ol"></i> </th>
                <th>Name <i class="fa fa-user"></i> </th>
                <th>Email <i class="fa fa-at"></i> </th>
                <th>Phone <i class="fa fa-phone"></i> </th>
                <th>Actions <i class="fa fa-radiation"></i> </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>

                            <a href="{{ route('admin_users.edit', $user->id) }}" class="btn btn-sm btn-info @if (isset(Auth::user()->id) && Auth::user()->id !== $user->id) disabled @endif"><i class="fa fa-edit"></i> Edit</a>

                            <form action="{{ route('admin_users.destroy', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-sm btn-danger" type="submit" @if (isset(Auth::user()->id) && Auth::user()->id !== $user->id) disabled @endif><i class="fa fa-trash"></i> Delete Account</button>
                            </form>

                    </td>
                </tr>
            @endforeach
        <tbody>
    </table>
</div>
@endsection

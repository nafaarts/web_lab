@extends('layouts.app')

@section('title', 'Admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h4 mb-0 text-gray-800">Admin</h1>
            <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary"><i class=" fas fa-fw fa-plus"></i>
                Tambah Admin</a>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-primary alert-dismissable mb-4">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ $message }}
            </div>
        @endif

        <div class="card p-3">
            <div class="table-responsive">
                <table class="table table-sm table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Email Address</th>
                            <th>Created at</th>
                            <th>Updated in</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>{{ $user->updated_at->diffForhumans() }}</td>
                                <td>
                                    <div>
                                        @if ($user->id != auth()->id())
                                            <a href="{{ route('users.edit', $user) }}" class="btn p-0 text-warning">
                                                <i class="fas fa-fw fa-edit"></i>
                                            </a>
                                            <form action="{{ route('users.destroy', $user) }}" method="POST"
                                                class="d-inline" onsubmit="return confirm('yakin dihapus?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn p-0 text-danger">
                                                    <i class="fas fa-fw fa-trash"></i>
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $users->links() }}
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection

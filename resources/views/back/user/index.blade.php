@extends('back.master')

    @section('content')
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <h5>Users</h5>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Roles</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @foreach ($user->roles as $role)
                                        <span class="badge bg-primary">{{ $role->name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach (Auth::user()->roles as $role)
                                        @if ($role->name === 'Manager')
                                        <a href="{{ url('auth/users/'. $user->id .'/edit') }}" class="btn btn-sm btn-info text-white">Manage Roles</a>
                                        <a href="{{ url('auth/users/'. $user->id.' ') }}" class="btn btn-sm btn-danger text-white" onclick="return confirm('Are you sure you want to delete.')">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                        @endif
                                    @endforeach
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <a class="btn btn-secondary" onclick="history.back(-1)">Back</a>
                </div>
            </div>
        </div>
    @endsection

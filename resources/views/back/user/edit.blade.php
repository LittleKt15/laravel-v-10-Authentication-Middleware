@extends('back.master')

    @section('content')
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <h5>User</h5>
                    <form action="{{ url('auth/users/'. $user->id .'/update') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <input type="text" name="name" class="form-control" value="{{ $user->name }}" readonly>
                        </div>
                        <h5>Roles</h5>
                        @foreach ($roles as $role)
                            <input type="checkbox" name="role_ids[]" value="{{ $role->id }}" class="mb-3" id="label{{ $role->id}}"
                            @foreach ($user->roles as $userRole)
                                @if ($userRole->name === $role->name)
                                    checked
                                @endif
                            @endforeach
                            >
                            <label for="label{{ $role->id}}" class="me-2">{{ $role->name }}</label>
                        @endforeach
                        <br>
                        <button class="btn btn-primary">Add Role</button>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    @endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1>Dashboard 3</h1>
                    <div>
                        <ul>
                            <li>Name: {{ Auth::user()->name }}</li>
                            <li>Email: {{ Auth::user()->email }}</li>
                            <li>
                                Roles:
                                @foreach (Auth::user()->roles as $role)
                                    <span class="badge text-bg-primary">{{ $role->name }}</span>
                                @endforeach
                            </li>
                        </ul>
                    </div>
                    <hr>

                    @foreach (Auth::user()->roles as $role)
                        @if ($role->name === "Manager" || $role->name === "Superviosr")
                            <a href=" {{ url('auth/managers') }} " class="btn btn-primary mx-1">Manager Dashboard</a>
                            <a href=" {{ url('auth/supervisors') }} " class="btn btn-primary mx-1">Supervisor Dashboard</a>
                        @elseif ($role->name === "Staff")
                            <a href=" {{ url('auth/staffs') }} " class="btn btn-primary mx-1">Staff Dashboard</a>
                        @elseif ($role->name === "User")
                        <a href="{{ url('auth/normal_users') }}" class="btn btn-primary mx-1">User Dashboard</a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

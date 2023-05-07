@extends('back.master')
    @section('content')
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Dashboard 2</h1>
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
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        {{-- <button class="btn btn-danger float-end" onclick="return confirm('Are you sure you want to logout?')">Logout</button> --}}
                    </form>

                    <hr>

                    @foreach (Auth::user()->roles as $role)
                        @if ($role->name === "Manager" || $role->name === "Superviosr")
                            <a href=" {{ url('auth/managers') }} " class="btn btn-primary">Manager Dashboard</a>
                            <a href=" {{ url('auth/supervisors') }} " class="btn btn-primary">Supervisor Dashboard</a>
                        @elseif ($role->name === "Staff")
                            <a href=" {{ url('auth/staffs') }} " class="btn btn-primary">Staff Dashboard</a>
                        @elseif ($role->name === "User")
                        <a href="{{ url('auth/normal_users') }}" class="btn btn-primary">User Dashboard</a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    @endsection

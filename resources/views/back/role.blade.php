@extends('back.master')

    @section('content')
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <h5>Roles</h5>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                            <tr>
                                <td>{{ $role->id }}</td>
                                <td>{{ $role->name }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a class="btn btn-secondary" onclick="history.back(-1)">Back</a>
                </div>
            </div>
        </div>
    @endsection

@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
        @if(session('message'))
            <div class="alert alert-success"> {{ session('message')  }} </div>
        @endif
            <div class="card">
                <div class="card-header">
                    <h4> User List
                        <a href="{{ url('admin/users/create') }}" class="btn btn-primary btn-sm float-end">Tambah User</a>
                    </h4>
                </div>
                <div class="card-body">
                <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php $no=1 @endphp
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if ($user->role_as == '0')
                                        Desa
                                    @else
                                        Kecamatan
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ url('admin/users/'.$user->id.'/edit') }}" class="btn btn-success">Edit</a>
                                    <a href="{{ url('admin/users/'.$user->id.'/delete') }}" onclick="return confirm('Are you sure want to delete this data?')" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-6">
        @if(session('message'))
            <div class="alert alert-success"> {{ session('message')  }} </div>
        @endif
            <div class="card">
                <div class="card-header">
                    <h4> User List
                        <a href="{{ url('admin/users') }}" class="btn btn-primary btn-sm float-end">Kembali</a>
                    </h4>
                </div>
                <div class="card-body">
                <form action="{{ url('admin/users/'.$user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                        <div class="col-md-6 mb-3">
                            <label>Nama</label>
                            <input type="text" name="nama" value="{{ $user->name }}" class="form-control"/>
                            @error('nama') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Email</label>
                            <input type="text" name="email" value="{{ $user->email }}" class="form-control"/>
                            @error('email') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Password</label>
                            <input type="text" name="password" class="form-control"/>
                            @error('password') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                                <label>Role</label>
                                <select name="role_as" class="form-control">
                                        <option value="{{ $user->role_as }}">
                                            @if($user->role_as == '1')
                                                Kecamatan
                                            @else 
                                                Desa
                                            @endif
                                        </option>
                                        <option value="0">Desa</option>
                                        <option value="1">Kecamatan</option>
                                </select>
                                @error('role_as') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                        <div class="col-md-6 mb-3">
                            <button type="submit" class="btn btn-primary float-end"> Save </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-md-12">

        @if(session('message'))
            <div class="alert alert-success"> {{ session('message')  }} </div>
        @endif
            <div class="card">
                <div class="card-header">
                    <h4> Kriteria
                        <a href="{{ url('admin/kriteria/create') }}" class="btn btn-primary btn-sm float-end">Tambah Kriteria</a>
                    </h4>
                </div>
                <div class="card-body">
                <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kriteria</th>
                                <th>Bobot</th>
                                <th>Atribut</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php $n = 1 @endphp
                            @forelse ($criterias as $criteria)
                            <tr>
                                <td>{{$n++}}</td>
                                <td>{{ $criteria->kriteria }}</td>
                                @foreach($kepentingans as $kepentingan)
                                    @if ($criteria->kepentingan == $kepentingan->id )
                                    <td>{{ $kepentingan->keterangan }}</td>
                                    @endif
                                @endforeach
                                <td>{{ $criteria->cost_benefit}}</td>
                                <td>
                                    <a href="{{ url('admin/kriteria/'.$criteria->id.'/edit') }}" class="btn btn-success">Edit</a>
                                    <a href="{{ url('admin/kriteria/'.$criteria->id.'/delete') }}" onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7">Tidak Ada Kriteria</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection